const express = require('express')
const multer = require('multer')
const router = express.Router()
const upload = multer()

const { 
    productos
} = require('../controllers')


router.put('/editproductos',productos)

module.exports = router