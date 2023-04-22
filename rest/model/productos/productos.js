const { DataTypes } = require("sequelize");
const { sequelizeMysql } = require("../../db/database");

const datapmtothersMysql = "productos";

const modelopmtothersMysqladd = sequelizeMysql.define(
  datapmtothersMysql,
  {
    nombre: {
      type: DataTypes.STRING,
      allowNull: false,
    },
    valor: {
      type: DataTypes.NUMBER,
      allowNull: false,
    },
  },
  {
    //la tabla se llama igual al nombre que se definio arriba
    freezeTableName: true,
    // evita la creacion de las columnas createdAt y updateAt
    timestamps: false,
  }
);
modelopmtothersMysqladd.removeAttribute("id");

async function datapmtothersregMysql() {
  try {
    const data = await modelopmtothersMysqladd();
  } catch (err) {
    console.log(err);
  }
}


module.exports = {
  datapmtothersregMysql,
  modelopmtothersMysqladd
};