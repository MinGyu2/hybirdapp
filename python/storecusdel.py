#-*- coding:utf-8 -*-
import sqlite3
import os

storename = input()
ids = input()

conn = sqlite3.connect("../store/"+storename+"/imformation.db")

cur = conn.cursor()

#img name
sql = "delete from customs where id= '"+ids+"';"
#sql = 'insert into items values("'+name+'","'+text+'")'
#sql ="insert into member values('name','ids','pwd','storelocation','phonenum','email')"
cur.execute(sql)
rows = cur.fetchall()
conn.commit()
conn.close()

os.system("sudo rm -r ../store/"+storename+"/custom/"+ids+"")
