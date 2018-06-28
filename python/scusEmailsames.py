#-*- coding:utf-8 -*-
import sqlite3

sname = input()
emails = input()
conn = sqlite3.connect("../store/"+sname+"/imformation.db")

cur = conn.cursor()
sql = "select email from customs"
#sql = "select storename from stores"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()

sameabless = 0
for row in rows:
	if(str(row[0]) == emails):
		sameabless=1

print(sameabless)
conn.close()
