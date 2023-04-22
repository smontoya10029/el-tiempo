const { modelopmtothersMysqladd  } = require("../pmt/productos")

async function datainsertgMySQL( valores ) {
  try {
    const data = await modelopmtothersMysqladd.bulkCreate( 
      valores  
    );
    return {
      data
    }
  } catch (err) {
    throw new Error(err.message || err.stack || 'Error no identificado' )
  }
}
module.exports = {
  datainsertgMySQL,
};