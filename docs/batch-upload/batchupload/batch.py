import csv
import HTMLParser
import time
import re
from botr_py import api

h = HTMLParser.HTMLParser()
platform = api.API('API_KEY', 'API_SECRET')

def parse_row(video={}):
	parsed_video = dict()
	for k, v in video.iteritems():
		# empty values will break the upload call
		if v is None or v == '': 
			continue
		elif k == 'download_url':
			parsed_video[k] = v
		# unescape html entities, utf8 decode values from csv
		elif k in ['title', 'description', 'tags'] or re.match('custom\.', k):
			parsed_video[k] = h.unescape(video[k].decode('utf-8'))
		# change date string to unix timestamp
		elif k == 'date':
			parsed_video[k] = video[k] if video[k].isdigit() else int(time.mktime(time.strptime(video[k], '%Y-%m-%d')))		
	return parsed_video

def upload_file(video={}):	
	# parse each parameter
	video = parse_row(video)
	# upload to platform
	return platform.call('/videos/create', video)

# main routine
with open('test.csv', 'rb') as f:
    reader = csv.reader(f)
    headings = reader.next()
    for row in reader:
    	video = dict(zip(headings, row))
        result = upload_file(video)
        # output success/failure message
        if result['status'] == 'ok':
        	print "%s upload success: key = %s." % (video['title'], result['video']['key'])
        else:
        	print "%s upload failed (%s)" % (video['title'], result['message'])