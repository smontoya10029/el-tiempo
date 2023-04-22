const { datainsertgMySQL } = require("../../models/productos/producto_insert");

const productos = async (req, res) => {
    try {
        //const resultBiPromotor = await datapmtothersregMsSQL(req.body);
        const insert = await datainsertgMySQL(JSON.parse(req.body.data))
        //res.send(resultBiPromotor.data);
        res.send(insert);
      } catch(err) {  
        res.status(500).send({
          mns: err.stack || err.message 
        })
      }
}
module.exports = {
  productos
};