#-*- coding:utf-8 -*-
import sqlite3

storename = input()
name = input()
price = input()
text = input()

conn = sqlite3.connect("../store/"+storename+"/imformation.db")

cur = conn.cursor()

#img name
sql = 'insert into items values("'+name+'","'+price+'","'+text+'")'
#sql ="insert into member values('name','ids','pwd','storelocation','phonenum','email')"
cur.execute(sql)
rows = cur.fetchall()
conn.commit()
conn.close()
