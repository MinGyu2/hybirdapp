#-*- coding:utf-8 -*-
import sqlite3
import os

sname = input()
ids = input()
pwds = input()
conn = sqlite3.connect("../store/store.db")

cur = conn.cursor()
sql = "select id from stores where storename = '"+sname+"'"
cur.execute(sql)
rows = cur.fetchall()
sameabless = 0
for row in rows:
	#print(row[0])
	if(row[0] == ids):
		sameabless = 1
#print(sameabless)
conn.close()
if(sameabless == 1):
	conn = sqlite3.connect("../store/store.db")
	cur = conn.cursor()
	sql = "select pwd from stores where id = '"+ids+"'"
	cur.execute(sql)
	rows = cur.fetchall()
	#print("aa : "+str(rows[0][0]))
	if(rows[0][0] == pwds):
		sameabless = 2
	else:
		sameabless = 0
print(sameabless)
