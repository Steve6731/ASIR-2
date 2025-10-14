import requests
import urllib.parse 
geocode_url = "https://graphhopper.com/api/1/geocode?"
route_url = "https://graphhopper.com/api/1/route?"
#loc1 = "Washington, D.C."
loc1 = "Washington, D.C."
loc2 = "Baltimore, Maryland"
key = "3dd76fa8-8fb7-445b-b6a8-207f11e62512" # Replace with your Graphhopper API key 

url = geocode_url + urllib.parse.urlencode({"q":loc1, "limit": "1", "key":key})

replydata = requests.get(url)
json_data = replydata.json()
json_status = replydata.status_code

json_status = replydata.status_code
if json_status == 200:
 print("Geocoding API URL for " + loc1 + ":\n" + url)
