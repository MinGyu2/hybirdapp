#-*- coding:utf-8 -*-
import sqlite3
import os

sname = input()
ids = input()
pwds = input()
conn = sqlite3.connect("../store/"+sname+"/imformation.db")

cur = conn.cursor()
sql = "select pwd from customs where id = '"+ids+"'"
cur.execute(sql)
rows = cur.fetchall()
if(rows[0][0] == pwds):
	print(1)
	#성공
else:
	print(0)
	#실패

#sameabless = 0
#if(rows[0][0] == ids):
#	sameabless = 1
#print(sameabless)
conn.close()
