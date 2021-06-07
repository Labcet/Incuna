<!DOCTYPE html>
<html>
<head>
	<title>asdasdasdasd</title>
	<style type="text/css">
		.container {
  position: relative;
  margin-top: 50px;
  width: 500px;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0);
  transition: background 0.5s ease;
}

.container:hover .overlay {
  display: block;
  background: rgba(0, 0, 0, .3);
}

img {
  position: absolute;
  width: 500px;
  height: 300px;
  left: 0;
}

.title {
  position: absolute;
  width: 500px;
  left: 0;
  top: 130px;
  font-weight: 700;
  font-size: 30px;
  text-align: center;
  text-transform: uppercase;
  color: white;
  z-index: 1;
  transition: top .5s ease;
}

.container:hover .title {
  top: 40px;
}

.button {
	color: white;
	position: absolute;
	left:0;
	top: 100px;
	text-align: center;
	opacity: 0;
	transition: opacity .35s ease;
	padding: 10px;
}

.container:hover .button {

  	transition-delay: 0.4s;
  	opacity: 1;
}

	</style>
</head>
<body>
	
	<!-- horizontal -->

<div class="container">
	<img src="https://images.unsplash.com/photo-1488628075628-e876f502d67a?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=&bg=" alt="" />
	<p class="title">RESULTADO: <?php echo $puntaje?></p>
	<div class="overlay">
	</div>
	<div class="button">
		<?php if($puntaje >= 190) : ?>
			<p>
				Tu perfil se asemeja bastante al de un/a empresario/a .
				Tienes iniciativa y disciplina, eres independiente. Ello no quiere decir que ya tengas
				asegurado el éxito pero sin duda a nivel personal tienes los rasgos necesarios para
				triunfar. Cuando decides hacer algo, no te detienes hasta que lo consigues. Partes
				de una buena base. Continúa con esta actitud, no te pares el éxito estará a tu lado.
			</p>
		<?php elseif($puntaje >= 140 && $puntaje <= 189) : ?>
			<p>
				Reúnes bastantes características para ser un buen
				empresario/a. No obstante aunque tus aptitudes son buenas, no te relajes, hay
				ciertos puntos que debes perfeccionar para lograr el éxito. Analizar tus puntos
				débiles y fija una serie de acciones concretas para mejorarlos en un plazo
				determinado de tiempo.
			</p>
		<?php elseif($puntaje >= 91 && $puntaje <= 139) : ?>
			<p>
				Debes tener precaución, tómate el tiempo necesario para
				recapacitar sobre tu futura empresa, aún tu confianza, determinación y
				conocimientos empresariales están un poco flojos, pero no te preocupes, lo único
				que debes hacer es leer, hablar con otras personas emprendedoras con éxito para
				aprender sus trucos ,aprende de ellos/as introduciendo tu propio estilo. Tienes
				potencial empresarial pero te falta un empujón.
			</p>
		<?php else : ?>
			<p>
				Si realmente lo que quieres es crear tu propia empresa, aun
				te queda un camino por recorrer, aunque en tu perfil hay alguno de los caracteres
				de persona emprendedora, en la mayoría de aspectos las dudas y la inseguridad te
				acompañan. Intenta analizar las razones de todo eso y procura desarrollar tu
				creatividad, capacidad de asumir riesgos, confianza,...mientras las vas
				desarrollando, continua trabajando para terceras personas y aprende de lo mejor
				de ellos.
			</p>
		<?php endif; ?>
	</div>
</div>

</body>
</html>
