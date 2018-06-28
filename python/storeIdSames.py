#-*- coding:utf-8 -*-
import sqlite3

ids = input()
conn = sqlite3.connect("../store/store.db")

cur = conn.cursor()
sql = "select id from stores"
#sql = "select storename from stores"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()

sameabless = 0
for row in rows:
	if(str(row[0]) == ids):
		sameabless=1
if(ids == "root"):
	sameabless = 1
print(sameabless)
conn.close()
