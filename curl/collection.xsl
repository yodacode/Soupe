<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:param name="owner" select="'Nicolas Eliaszewicz'"/>
	<xsl:output method="html" encoding="iso-8859-1" indent="no"/>

 	<xsl:template match="root">
  		Hey! Welcome to <xsl:value-of select="$owner"/>'s sweet CD collection! 
	    <xsl:for-each select="item">
		    <xsl:call-template name="iteme"/>
	    </xsl:for-each>
 	</xsl:template>
	
	<xsl:template name="iteme">
  		<h1><xsl:value-of select="id"/></h1>
  		<h2>by <xsl:value-of select="name"/> - <xsl:value-of select="address"/></h2>
  		<hr />
 	</xsl:template>
 	
</xsl:stylesheet>