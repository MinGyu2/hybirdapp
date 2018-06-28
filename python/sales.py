#-*- coding:utf-8 -*-
import sqlite3

sname = input()

conn = sqlite3.connect("../store/"+sname+"/imformation.db");

cur = conn.cursor()
#sql = "select id from "
sql = "select * from customs"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
ss = 0
daydicts ={}
mondicts = {}
sames = ""
for row in rows:
	conn2 = sqlite3.connect("../store/"+sname+"/custom/"+row[0]+"/orders.db");
	cur2 = conn2.cursor()
	sql2 = "select * from orderitem"
	cur2.execute(sql2)
	rows2 = cur2.fetchall()
	for row2 in rows2:
		#day sale
		if int(row2[1][0:8]) in daydicts:
			daydicts[int(row2[1][0:8])] +=int(row2[2])
		else:
			daydicts[int(row2[1][0:8])] = int(row2[2])
		#month sale
		if int(row2[1][0:6]) in mondicts:
			mondicts[int(row2[1][0:6])] += int(row2[2])
		else:
			mondicts[int(row2[1][0:6])] = int(row2[2])
	conn2.close()
conn.close()

dd = list(daydicts.keys())
dd = sorted(dd)
print("<ul>하루 기준 매출")
for k in dd:
	print("<li style='font-size:30px'>")
	print(str(k)+" : "+str(daydicts[k])+"원")
	print("</li>")
print("</ul>")
mm = list(mondicts.keys())
mm = sorted(mm)
print("<ul>한달 기준 매출")
for k in mm:
	print("<li style='font-size:30px'>")
	print(str(k)+" : "+str(mondicts[k])+"원")
	print("</li>")
print("</ul>")
#print(mondicts)
