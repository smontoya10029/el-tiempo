const { Sequelize, QueryTypes } = require("sequelize");
const tedious = require("tedious");
const { Config } = require("../src/config/index")

// *Conexion a BD Mysql
const sequelizeMysql = new Sequelize(
  "productos_node",//Config.mysql_db,
  "root",//Config.mysql_usr,
  "",//Config.mysql_pass,
  {
    host: "127.0.0.1",//`${Config.mysql_host}`,//,//,
    //port: 3306,
    dialect: "mysql",
  }
);

module.exports = { sequelizeMysql };