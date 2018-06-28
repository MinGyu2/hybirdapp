#-*- coding:utf-8 -*-
import sqlite3

sname = input()
ids = input()

conn = sqlite3.connect("../store/"+sname+"/custom/"+ids+"/orders.db");

cur = conn.cursor()
#sql = "select id from "
sql = "select * from orderitem"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
for row in rows:
	ss = ""
	#if(row[2] == "0"):
	#	ss = "주문중"
	#else:	
	#	ss = "받음"
	print("<li style='font-size:20px'>"+str(row[1])+" : "+str(row[0])+"<br>")
	print(row[2])
	print("</li>")
conn.close()
