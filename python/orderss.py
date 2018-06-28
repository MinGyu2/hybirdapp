#-*- coding:utf-8 -*-
from datetime import datetime
import sqlite3

sname = input()
iname = input()
ids = input()
price = input()

ordernum = ((((datetime.today().year*100+datetime.today().month)*100+datetime.today().day)*100+datetime.today().hour)*100+datetime.today().minute)*100 +datetime.today().second

#itemname text,ordertime text,orderable text
conn = sqlite3.connect("../store/"+sname+"/custom/"+ids+"/orders.db");
cur = conn.cursor()
sql = 'insert into orderitem values("'+iname+'","'+str(ordernum)+'","'+price+'")'
cur.execute(sql)
rows = cur.fetchall()
conn.commit()
conn.close()
print(ordernum);
