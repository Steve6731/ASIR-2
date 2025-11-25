# ejercicio final usando Mongodb III
```sh
#Devuelve todos los restaurantes de cocina "Italian" que estén en el distrito "Brooklyn".
#Solo Italian
db.restaurants.findOne({cuisine:'Italian'})
#ambos
db.restaurants.findOne({
   borough: 'Brooklyn',
   cuisine: 'Italian'
})

#solo enseña los que quiero
db.restaurants.findOne({},{
	_id:0,name:1,borough:1,
  cuicine:1,grades:1
})
```

在mongodb find()如何只显示array grades.0.score元素