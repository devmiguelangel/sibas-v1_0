<?php /* Smarty version 2.6.26, created on 2014-01-16 13:35:24
         compiled from notimplemented.tpl */ ?>
<?php if ($this->_tpl_vars['courselevelexport']): ?><?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<?php endif; ?>
<assessmentItem xmlns="http://www.imsglobal.org/xsd/imsqti_item_v2p0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.imsglobal.org/xsd/imsqti_item_v2p0 ./imsqti_item_v2p0.xsd" identifier="<?php echo $this->_tpl_vars['assessmentitemidentifier']; ?>
" title="<?php echo $this->_tpl_vars['assessmentitemtitle']; ?>
" adaptive="false" timeDependent="false">
	<responseDeclaration identifier="<?php echo $this->_tpl_vars['questionid']; ?>
" cardinality="single" baseType="string"/>
	<outcomeDeclaration identifier="SCORE" cardinality="single" baseType="integer"/>
	<itemBody>
		<p><?php echo $this->_tpl_vars['questionText']; ?>
</p>
		<div class="interactive.textEntry">
			<textEntryInteraction responseIdentifier="<?php echo $this->_tpl_vars['questionid']; ?>
" expectedLength="200"></textEntryInteraction>
		</div>
	<?php if ($this->_tpl_vars['question_has_image'] == 1): ?>
		<div class="media">
	    <?php if ($this->_tpl_vars['hassize'] == 1): ?>
			<object type="<?php echo $this->_tpl_vars['question']->mediamimetype; ?>
" data="<?php echo $this->_tpl_vars['question']->mediaurl; ?>
" width="<?php echo $this->_tpl_vars['question']->mediax; ?>
" height="<?php echo $this->_tpl_vars['question']->mediay; ?>
" />
		<?php else: ?>
			<object type="<?php echo $this->_tpl_vars['question']->mediamimetype; ?>
" data="<?php echo $this->_tpl_vars['question']->mediaurl; ?>
" />
		<?php endif; ?>
		</div>
	<?php endif; ?>
	</itemBody>
</assessmentItem>