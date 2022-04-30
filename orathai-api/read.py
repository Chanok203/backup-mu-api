
f = open("dict.txt","r")
data = f.readlines()
f.close()
data.append("สุนทรา\n")



data.sort()

a = open("dict.txt","w")
for d in data:
	a.write(d)


