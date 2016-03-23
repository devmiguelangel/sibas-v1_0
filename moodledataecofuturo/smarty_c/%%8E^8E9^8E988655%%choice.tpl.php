<?php /* Smarty version 2.6.26, created on 2014-01-16 13:35:24
         compiled from choice.tpl */ ?>
<?php if ($this->_tpl_vars['courselevelexport']): ?><?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<?php endif; ?>
<assessmentItem xmlns="http://www.imsglobal.org/xsd/imsqti_item_v2p0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.imsglobal.org/xsd/imsqti_item_v2p0 ./imsqti_item_v2p0.xsd" identifier="<?php echo $this->_tpl_vars['assessmentitemidentifier']; ?>
" title="<?php echo $this->_tpl_vars['assessmentitemtitle']; ?>
" adaptive="false" timeDependent="false">
	<responseDeclaration identifier="<?php echo $this->_tpl_vars['questionid']; ?>
" cardinality="single" baseType="identifier">
		<correctResponse>
			<value><?php echo $this->_tpl_vars['correctresponse']['id']; ?>
</value>
		</correctResponse>
		<mapping defaultValue="0">
			<mapEntry mapKey="<?php echo $this->_tpl_vars['correctresponse']['id']; ?>
" mappedValue="<?php echo $this->_tpl_vars['correctresponse']['fraction']; ?>
"/>
		</mapping>

	</responseDeclaration>
	<outcomeDeclaration identifier="SCORE" cardinality="single" baseType="float">
		<defaultValue>
			<value>0</value>
		</defaultValue>
	</outcomeDeclaration>
	<itemBody>
		<p><?php echo $this->_tpl_vars['questionText']; ?>
</p>
		<div class="intreactive.choiceSimple">
			<choiceInteraction responseIdentifier="<?php echo $this->_tpl_vars['questionid']; ?>
" shuffle="false" maxChoices="1">
    		<?php unset($this->_sections['answer']);
$this->_sections['answer']['name'] = 'answer';
$this->_sections['answer']['loop'] = is_array($_loop=$this->_tpl_vars['answers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['answer']['show'] = true;
$this->_sections['answer']['max'] = $this->_sections['answer']['loop'];
$this->_sections['answer']['step'] = 1;
$this->_sections['answer']['start'] = $this->_sections['answer']['step'] > 0 ? 0 : $this->_sections['answer']['loop']-1;
if ($this->_sections['answer']['show']) {
    $this->_sections['answer']['total'] = $this->_sections['answer']['loop'];
    if ($this->_sections['answer']['total'] == 0)
        $this->_sections['answer']['show'] = false;
} else
    $this->_sections['answer']['total'] = 0;
if ($this->_sections['answer']['show']):

            for ($this->_sections['answer']['index'] = $this->_sections['answer']['start'], $this->_sections['answer']['iteration'] = 1;
                 $this->_sections['answer']['iteration'] <= $this->_sections['answer']['total'];
                 $this->_sections['answer']['index'] += $this->_sections['answer']['step'], $this->_sections['answer']['iteration']++):
$this->_sections['answer']['rownum'] = $this->_sections['answer']['iteration'];
$this->_sections['answer']['index_prev'] = $this->_sections['answer']['index'] - $this->_sections['answer']['step'];
$this->_sections['answer']['index_next'] = $this->_sections['answer']['index'] + $this->_sections['answer']['step'];
$this->_sections['answer']['first']      = ($this->_sections['answer']['iteration'] == 1);
$this->_sections['answer']['last']       = ($this->_sections['answer']['iteration'] == $this->_sections['answer']['total']);
?>
				<simpleChoice identifier="<?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['answer']; ?>

				<?php if ($this->_tpl_vars['answers'][$this->_sections['answer']['index']]['feedback'] != ''): ?>
    				<?php if ($this->_tpl_vars['answers'][$this->_sections['answer']['index']]['answer'] != $this->_tpl_vars['correctresponse']['answer']): ?>
	   			    <feedbackInline identifier="<?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['id']; ?>
" outcomeIdentifier="FEEDBACK" showHide="hide"><?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['feedback']; ?>
</feedbackInline>
                    <?php endif; ?>
                <?php endif; ?>
				</simpleChoice>
    		<?php endfor; endif; ?>
			</choiceInteraction>
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
		</div>
	</itemBody>
	<responseProcessing xmlns="http://www.imsglobal.org/xsd/imsqti_item_v2p0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.imsglobal.org/xsd/imsqti_item_v2p0 ../imsqti_item_v2p0.xsd">
		<responseCondition>
			<responseIf>

				<match>
					<variable identifier="<?php echo $this->_tpl_vars['questionid']; ?>
"/>
					<correct identifier="<?php echo $this->_tpl_vars['questionid']; ?>
"/>
				</match>
				<setOutcomeValue identifier="SCORE">
					<baseValue baseType="float">1</baseValue>
				</setOutcomeValue>
			</responseIf>

			<responseElse>
				<setOutcomeValue identifier="SCORE">
					<baseValue baseType="float">0</baseValue>
				</setOutcomeValue>
			</responseElse>
		</responseCondition>
        <setOutcomeValue identifier="FEEDBACK">
            <variable identifier="<?php echo $this->_tpl_vars['questionid']; ?>
"/>
        </setOutcomeValue>		
	</responseProcessing>
	<?php unset($this->_sections['answer']);
$this->_sections['answer']['name'] = 'answer';
$this->_sections['answer']['loop'] = is_array($_loop=$this->_tpl_vars['answers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['answer']['show'] = true;
$this->_sections['answer']['max'] = $this->_sections['answer']['loop'];
$this->_sections['answer']['step'] = 1;
$this->_sections['answer']['start'] = $this->_sections['answer']['step'] > 0 ? 0 : $this->_sections['answer']['loop']-1;
if ($this->_sections['answer']['show']) {
    $this->_sections['answer']['total'] = $this->_sections['answer']['loop'];
    if ($this->_sections['answer']['total'] == 0)
        $this->_sections['answer']['show'] = false;
} else
    $this->_sections['answer']['total'] = 0;
if ($this->_sections['answer']['show']):

            for ($this->_sections['answer']['index'] = $this->_sections['answer']['start'], $this->_sections['answer']['iteration'] = 1;
                 $this->_sections['answer']['iteration'] <= $this->_sections['answer']['total'];
                 $this->_sections['answer']['index'] += $this->_sections['answer']['step'], $this->_sections['answer']['iteration']++):
$this->_sections['answer']['rownum'] = $this->_sections['answer']['iteration'];
$this->_sections['answer']['index_prev'] = $this->_sections['answer']['index'] - $this->_sections['answer']['step'];
$this->_sections['answer']['index_next'] = $this->_sections['answer']['index'] + $this->_sections['answer']['step'];
$this->_sections['answer']['first']      = ($this->_sections['answer']['iteration'] == 1);
$this->_sections['answer']['last']       = ($this->_sections['answer']['iteration'] == $this->_sections['answer']['total']);
?>
        <?php if ($this->_tpl_vars['answers'][$this->_sections['answer']['index']]['feedback'] != ''): ?>
	<modalFeedback outcomeIdentifier="FEEDBACK" identifier="<?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['id']; ?>
" showHide="hide"><?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['feedback']; ?>
</modalFeedback>
    	<?php endif; ?>
	<?php endfor; endif; ?>
</assessmentItem>