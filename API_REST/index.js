const express = require('express')
const mysql = require('mysql')
const bodyParser = require('body-parser')

const app = express()

app.use(bodyParser.json())

const PUERTO = 3000

const conexion = mysql.createConnection(
    {
        host:'localhost',
        database:'login',
        user:'root',
        password:''

    }
)

app.listen(PUERTO, () =>{
    console.log(`servidor corriendo en el puerto $(PUERTO)`);
})

conexion.connect(error => {
    if(error) throw error
    console.log('conexion exitosa a la base de datos');
});

app.get('/',(req,res)=> {

    res.send('API')

})

// productos

app.get('/productos',(req,res)=>{
    const query = `SELECT * FROM products`;
    conexion.query(query,(error,resultado) => {
        if(error) return console.error(error.message)

        const obj = { }
        if(resultado.length > 0 ){
            obj.listaProductos = resultado
            res.json(obj)
        }else{
            res.json(`No hay registros`)
        }
    })
})

app.get('/producto',(req,res)=>{
    const query = `SELECT * FROM products WHERE id=${id};`
    conexion.query(query,(error,resultado) => {
        if(error) return console.error(error.message)

        if(resultado.length > 0 ){
            obj.listauser = resultado
            res.json(resultado)
        }else{
            res.json(`No hay registros`)
        }
    })
})


app.post('/producto/agregar',(req,res)=>{

    const producto = {

        name: req.body.name,
        descripcion: req.body.descripcion,
        precio: req.body.precio,
        disponibilidad: req.body.disponibilidad,
        cantidad: req.body.cantidad,
        comentarios: req.body.comentarios

    }

    const query = `INSERT INTO products SET ? `
    conexion.query(query,producto, (error)=>{
        if(error) return console.error(error.message)

        res.json(`se inserto correctamente el producto`)
    })

    
   
})

app.put('/producto/editar/:id',(req,res)=>{

    const {id} = req.params
    const {
        name,
        descripcion,
        precio,
        disponibilidad,
        cantidad,
        comentarios

    } = req.body

    const query = `UPDATE products SET name='${name}',descripcion='${descripcion}',
    precio='${precio}',
    disponibilidad='${disponibilidad}',
    cantidad='${cantidad}',
    comentarios='${comentarios}'
    WHERE id='${id}';`
    conexion.query(query,(error)=>{
        if(error) return console.error(error.message)
    
        res.json(`se inserto correctamente el producto`)
    })
})

app.delete('/producto/delete/:id', (req,res)=>{
    const {id} = req.params

    const query = `DELETE FROM products WHERE id=${id};`
    conexion.query(query,(error)=>{
        if(error) console.error(error.message)

        res.json(`se elimino correctamente el producto`)
    })
})

// bebidas__________________________________________________________________

app.get('/bebidas',(req,res)=>{
    const query = `SELECT * FROM bebidas`;
    conexion.query(query,(error,resultado) => {
        if(error) return console.error(error.message)

        const obj = { }
        if(resultado.length > 0 ){
            obj.listaBebidas = resultado
            res.json(obj)
        }else{
            res.json(`No hay registros`)
        }
    })
})

app.get('/bebida',(req,res)=>{
    const query = `SELECT * FROM bebidas WHERE id=${id};`
    conexion.query(query,(error,resultado) => {
        if(error) return console.error(error.message)

        if(resultado.length > 0 ){
            obj.listauser = resultado
            res.json(resultado)
        }else{
            res.json(`No hay registros`)
        }
    })
})


app.post('/bebida/agregar',(req,res)=>{

    const producto = {

        name: req.body.name,
        descripcion: req.body.descripcion,
        precio: req.body.precio,
      
    }

    const query = `INSERT INTO bebidas SET ? `
    conexion.query(query,producto, (error)=>{
        if(error) return console.error(error.message)

        res.json(`se inserto correctamente el producto bebidas`)
    })

    
   
})

app.put('/bebida/editar/:id',(req,res)=>{

    const {id} = req.params
    const {
        name,
        descripcion,
        precio,
       
    } = req.body

    const query = `UPDATE bebidas SET name='${name}',
    descripcion='${descripcion}',
    precio='${precio}'
    WHERE id='${id}';`
    conexion.query(query,(error)=>{
        if(error) return console.error(error.message)
    
        res.json(`se inserto correctamente el producto bebidas`)
    })
})

app.delete('/bebida/delete/:id', (req,res)=>{
    const {id} = req.params

    const query = `DELETE FROM bebidas WHERE id=${id};`
    conexion.query(query,(error)=>{
        if(error) console.error(error.message)

        res.json(`se elimino correctamente el producto bebidas`)
    })
})

// postres________________________________________________________________

app.get('/postres',(req,res)=>{
    const query = `SELECT * FROM postres`;
    conexion.query(query,(error,resultado) => {
        if(error) return console.error(error.message)

        const obj = { }
        if(resultado.length > 0 ){
            obj.listaPostres = resultado
            res.json(obj)
        }else{
            res.json(`No hay registros`)
        }
    })
})

app.get('/postre',(req,res)=>{
    const query = `SELECT * FROM postres WHERE id=${id};`
    conexion.query(query,(error,resultado) => {
        if(error) return console.error(error.message)

        if(resultado.length > 0 ){
            obj.listauser = resultado
            res.json(resultado)
        }else{
            res.json(`No hay registros`)
        }
    })
})

app.post('/postre/agregar',(req,res)=>{

    const bebida = {

        name: req.body.name,
        descripcion: req.body.descripcion,
        precio: req.body.precio,
      
    }

    const query = `INSERT INTO postres SET ? `
    conexion.query(query,bebida, (error)=>{
        if(error) return console.error(error.message)

        res.json(`se inserto correctamente el producto postres`)
    })

    
   
})

app.put('/postre/editar/:id',(req,res)=>{

    const {id} = req.params
    const {
        name,
        descripcion,
        precio,
       
    } = req.body

    const query = `UPDATE postres SET name='${name}',
    descripcion='${descripcion}',
    precio='${precio}'
    WHERE id='${id}';`
    conexion.query(query,(error)=>{
        if(error) return console.error(error.message)
    
        res.json(`se inserto correctamente el producto bebidas`)
    })
})

app.delete('/postre/delete/:id', (req,res)=>{
    const {id} = req.params

    const query = `DELETE FROM postres WHERE id=${id};`
    conexion.query(query,(error)=>{
        if(error) console.error(error.message)

        res.json(`se elimino correctamente el producto bebidas`)
    })
})