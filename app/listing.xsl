<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:import href="layout.xsl"/>
 	<xsl:template match="root">
 		<html>
 			<head>
			    <meta charset="utf-8"/>
			    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
			    <meta name="viewport" content="width=device-width, initial-scale=1"/>
			    <title>App : Listing</title>
			    <!-- Bootstrap -->
			    <link href="/app/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
			    <style type="text/css">
			      .overflow {
			        overflow: hidden;
			      }
			    </style>
	  		</head>
	  		<body>
		  				  		
			    <xsl:call-template name="layout">
			    		<xsl:with-param name="content">
			    			<h1>	 Ouaish </h1>
			    		</xsl:with-param>
			    </xsl:call-template>

			    <xsl:for-each select="item">
				    <xsl:call-template name="iteme"/>
			    </xsl:for-each>


			    <!-- Modal -->
			    <div class="modal fade" id="addPlace" tabindex="-1" role="dialog" aria-labelledby="addPlace" aria-hidden="true">
			      <div class="modal-dialog">
			        <div class="modal-content">
			          <div class="modal-header">
			            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			            <h4 class="modal-title" id="addPlace">Ajouter une place</h4>
			          </div>
			          <div class="modal-body">
			            ...
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            <button type="button" class="btn btn-primary">Save</button>
			          </div>
			        </div>
			      </div>
			    </div>

			    <!-- Modal -->
			    <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="addComment" aria-hidden="true">
			      <div class="modal-dialog">
			        <div class="modal-content">
			          <div class="modal-header">
			            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			            <h4 class="modal-title" id="addComment">Ajouter un commentaire</h4>
			          </div>
			          <div class="modal-body">
			            ...
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            <button type="button" class="btn btn-primary">Save</button>
			          </div>
			        </div>
			      </div>
			    </div>


			    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			    <script src="/app/jquery/jquery.min.js"></script>
			    <!-- Include all compiled plugins (below), or include individual files as needed -->
			    <script src="/app/bootstrap/js/bootstrap.min.js"></script>
			    <script type="text/javascript" src="/app/js/App.js"></script>

		    </body>
  		</html>
 	</xsl:template>

	
	<xsl:template name="iteme">
  		<h1><xsl:value-of select="id"/></h1>
  		<h2>by <xsl:value-of select="name"/> - <xsl:value-of select="address"/></h2>
  		<hr />
 	</xsl:template>

</xsl:stylesheet>
