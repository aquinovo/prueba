var express = require('express');
var mdls = require('../models/session');
var router = express.Router();

/* GET home page. */

router.get('/login', function(req, res, next) {
	res.render('login.html');
});

router.post('/login', function(req, res, next) {
	//Autenticar usuario...


	req.session.email = req.body.email;

	var info = {sid: req.sessionID, email: req.session.email, rols: null};

	mdls.inicioSesion(info, function (err, resultado){

		if(err){
			err.message = 'Internal Server Error';
  			err.status = 500;
  			next(err);
  			return;
		}

		res.redirect('/');

	});
});

router.get('/logout', function(req, res, next) {

	mdls.finSesion(req.sessionID, function (err, resultado){

		if(err){
			err.message = 'Internal Server Error';
  			err.status = 500;
  			next(err);
  			return;
		}

		req.session.destroy();
		res.redirect('/');

	});
});


module.exports = router;
