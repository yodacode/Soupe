<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:import href="layout.xsl"/>

 	<xsl:template match="root/item">

	    <xsl:call-template name="layout">
	    		<xsl:with-param name="content">
	    			
	    			<div class="col-md-3">
	    				<div class="page-header">
	    					<h2><xsl:value-of select="name"/></h2>
	    				</div>
	    				<div class="col-md-12">		
	    					<p><strong><xsl:value-of select="address"/></strong></p>
	    					<div class="col-md-6"><strong>7/10</strong></div>
	    					<div class="col-md-6">3 Avis</div>
	    				</div>
	    				
	    			</div>
	    			<div class="col-md-9" id="comments-container">	
	    				<div class="page-header overflow" id="page">
	    					<xsl:attribute name="data-place-id">
	    						<xsl:value-of select="id"/>
	    					</xsl:attribute>
	    					<h2 class="pull-left">Avis</h2>
	    					<button class="btn pull-right" data-toggle="modal" data-target="#addComment">Ajouter un commentaire</button>
	    				</div>
	    				<div class="item" style="min-height:145px">
	    					<div class="col-md-5">
	    						<h3 class="author">Avis de Michel Dupont</h3>
	    						<p><strong><span class="rate">7</span>/10</strong></p>			
	    					</div>
	    					<div class="col-md-7">	    						
	    						<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    					</div>
	    				</div>
	    			</div>
	    		</xsl:with-param>
	    </xsl:call-template>	   

 	</xsl:template>

</xsl:stylesheet>
