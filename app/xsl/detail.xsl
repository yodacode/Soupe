<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:import href="layout.xsl"/>

 	<xsl:template match="root">


	    <xsl:call-template name="layout">
	    		<xsl:with-param name="content">
	    			DETAIL
	    		</xsl:with-param>
	    </xsl:call-template>
	   

 	</xsl:template>

</xsl:stylesheet>
