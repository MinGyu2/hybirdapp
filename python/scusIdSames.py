#-*- coding:utf-8 -*-
import sqlite3
import os

sname = input()
ids = input()
conn = sqlite3.connect("../store/store.db")

cur = conn.cursor()
sql = "select id from stores where storename = '"+sname+"'"
cur.execute(sql)
rows = cur.fetchall()


sameabless = 0
if(rows[0][0] == ids):
	sameabless = 1
print(sameabless)
conn.close()
