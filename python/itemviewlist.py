#-*- coding:utf-8 -*-
import sqlite3

storename = input()
conn = sqlite3.connect("../store/"+storename+"/imformation.db")

cur = conn.cursor()
#sql = "select id from "
sql = "select * from items"
#sql ="SELECT name FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
for row in rows:
        print("<form action='buy.php' method='post' >")
        print("<input name='name' type='hidden' value ='"+row[0]+"'/>")
        print("<input name='stname' type='hidden' value ='"+storename+"'/>")
        print("<input name='price' type='hidden' value ='"+row[1]+"'/>")
        print("<input name='context' type='hidden' value ='"+row[2]+"'/>")
        print("<input name='cusorpro' type='hidden' value = ''/>")
        print("<div class='main' name='bbb' id='aaa' onclick='submitss(this)'>")
        print("<img class='main_common' src='../store/"+storename+"/img/"+row[0]+"/1.jpg' />")
        print("<div class='sssss'>")
        print("<p style='font-size:20px;'>"+row[0]+"</p>");
        print("<p style='font-size:20px;'>가격 : "+row[1]+"원</p>");
        print("</div>")
        print("</div>")
        print("</form>")
#print("aaa");
conn.close()
