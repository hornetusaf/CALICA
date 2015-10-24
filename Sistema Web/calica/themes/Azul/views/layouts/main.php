<!DOCTYPE html> <!-- The new doctype -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->language;?>" lang="<?php echo Yii::app()->language;?>">
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset;?>" />
        <meta name="language" content="<?php echo Yii::app()->language;?>"/>
		
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
        <!-- Internet Explorer HTML5 enabling code: -->
        
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        
        <style type="text/css">
        .clear {
          zoom: 1;
          display: block;
        }
        </style>

        
        <![endif]-->
        
    </head>
    
    <body>
    	
    	<section id="page"> <!-- Defining the #page section with the section tag -->
    
            <header> <!-- Defining the header section of the page with the appropriate tag -->
            
                <hgroup>
		    <br>
	            <center><img src="/calica/images/unet.png" alt="UNET" width="122" height="150">
                    <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
                    <h3>Laboratorio de Instrumentación, Control y Automatización.</h3></center>
                </hgroup>
                <br>
				<div id="mainMbMenu">											
					<?php 
						$this->widget
						('application.extensions.mbmenu.MbMenu',array
							( 
								'items'=>array
								( 
									array('label'=>'Inicio', 'url'=>array('/site/index')), 
									array('label'=>'Usuarios','items'=>array(array('label'=>'Gestión', 'url'=>array('/usuario'),'active'=>$this->id=='usuario'?true:false),array('label'=>'Horarios', 'url'=>array('/horario'),'active'=>$this->id=='horario'?true:false),array('label'=>'Tipos de usuario', 'url'=>array('/tipoUsuario'),'active'=>$this->id=='tipoUsuario'?true:false),array('label'=>'Carreras / Departamentos', 'url'=>array('/carreraDepartamento'),'active'=>$this->id=='carreraDepartamento'?true:false),),), 
									array('label'=>'Control','items'=>array(array('label'=>'Entradas', 'url'=>array('/registroEntrada'),'active'=>$this->id=='registroEntrada'?true:false),array('label'=>'Salidas', 'url'=>array('/registroSalida'),'active'=>$this->id=='registroSalida'?true:false),),),									
									array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
									array('label'=>'Iniciar sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
									array('label'=>'Cerrar sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
								),
							)
						); 										
						?>					
				</div>
            </header>            
            <section id="articles"> <!-- A new section with the articles -->
				<!-- Article 1 start -->
                <div class="line"></div>  <!-- Dividing line -->				
                <article id="article"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->				
                    <div class="articleBody clear">		
<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>	
<br>

	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operaciones',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->

						<?php echo $content; ?>
                    </div>
                </article>
				<!-- Article end -->
            </section>

        <footer> <!-- Marking the footer section -->
           <div class="line"></div>
           <p><h3><a target="_blank" href="http://www.unet.edu.ve/">Universidad Nacional Experimental del Táchira.</a></h3></p> <!-- Change the copyright notice -->
		   <br><br>
           <h3><a href="#" class="up">Ir arriba</a></h3>
           <br>
        </footer>
		</section> <!-- Closing the #page section -->
    </body>
</html>
