<?php /* Smarty version 2.6.26, created on 2014-01-16 13:35:24
         compiled from choiceMultiple.tpl */ ?>
<?php if ($this->_tpl_vars['courselevelexport']): ?><?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<?php endif; ?>
<assessmentItem xmlns="http://www.imsglobal.org/xsd/imsqti_v2p0"
				xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
				xsi:schemaLocation="http://www.imsglobal.org/xsd/imsqti_v2p0 imsqti_v2p0.xsd"
				identifier="<?php echo $this->_tpl_vars['assessmentitemidentifier']; ?>
" title="<?php echo $this->_tpl_vars['assessmentitemtitle']; ?>
" adaptive="false" timeDependent="false">
	<responseDeclaration identifier="<?php echo $this->_tpl_vars['questionid']; ?>
" cardinality="<?php echo $this->_tpl_vars['responsedeclarationcardinality']; ?>
" baseType="identifier">
		<correctResponse>
		<?php unset($this->_sections['answer']);
$this->_sections['answer']['name'] = 'answer';
$this->_sections['answer']['loop'] = is_array($_loop=$this->_tpl_vars['correctresponses']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<value><?php echo $this->_tpl_vars['correctresponses'][$this->_sections['answer']['index']]['id']; ?>
</value>
		<?php endfor; endif; ?>
		</correctResponse>
	</responseDeclaration>
	<outcomeDeclaration identifier="SCORE" cardinality="single" baseType="float">
		<defaultValue>
			<value>0</value>
		</defaultValue>
	</outcomeDeclaration>
	<outcomeDeclaration identifier="FEEDBACK" cardinality="<?php echo $this->_tpl_vars['responsedeclarationcardinality']; ?>
" baseType="identifier"/>
	<outcomeDeclaration identifier="FEEDBACK2" cardinality="single" baseType="identifier"/>
	<itemBody>
	   <div class="assesmentItemBody">
		<p><?php echo $this->_tpl_vars['questionText']; ?>
</p>
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
		<div class="interactive.choiceMultiple">
			<choiceInteraction responseIdentifier="<?php echo $this->_tpl_vars['questionid']; ?>
" shuffle="<?php echo $this->_tpl_vars['shuffle']; ?>
" maxChoices="<?php echo $this->_tpl_vars['maxChoices']; ?>
">
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
				<simpleChoice identifier="i<?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['answer']; ?>

				<?php if ($this->_tpl_vars['answers'][$this->_sections['answer']['index']]['feedback'] != ''): ?>
    				<?php if ($this->_tpl_vars['answers'][$this->_sections['answer']['index']]['answer'] != $this->_tpl_vars['correctresponse']['answer']): ?>
	   			    <feedbackInline identifier="i<?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['id']; ?>
" outcomeIdentifier="FEEDBACK" showHide="show"><?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['feedback']; ?>
</feedbackInline>
                    <?php endif; ?>
                <?php endif; ?>
				</simpleChoice>
    		<?php endfor; endif; ?>
			</choiceInteraction>
		</div>
	</itemBody>
	<responseProcessing>
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
		<responseCondition>
			<responseIf>
				<<?php echo $this->_tpl_vars['operator']; ?>
>
					<baseValue baseType="identifier">i<?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['id']; ?>
</baseValue>
					<variable identifier="<?php echo $this->_tpl_vars['questionid']; ?>
"/>
				</<?php echo $this->_tpl_vars['operator']; ?>
>
				<setOutcomeValue identifier="SCORE">
					<sum>
						<variable identifier="SCORE"/>
						<baseValue baseType="float"><?php echo $this->_tpl_vars['answers'][$this->_sections['answer']['index']]['fraction']; ?>
</baseValue>
					</sum>
				</setOutcomeValue>
			</responseIf>
		</responseCondition>
		<?php endfor; endif; ?>
		<responseCondition>
			<responseIf>
				<lte>
					<variable identifier="SCORE"/>
					<baseValue baseType="float">0</baseValue>
				</lte>
				<setOutcomeValue identifier="SCORE">
					<baseValue baseType="float">0</baseValue>
				</setOutcomeValue>
				<setOutcomeValue identifier="FEEDBACK2">
					<baseValue baseType="identifier">INCORRECT</baseValue>
				</setOutcomeValue>
			</responseIf>
			<responseElseIf>
				<gte>
					<variable identifier="SCORE"/>
					<baseValue baseType="float">0.99</baseValue>
				</gte>
				<setOutcomeValue identifier="SCORE">
					<baseValue baseType="float">1</baseValue>
				</setOutcomeValue>
				<setOutcomeValue identifier="FEEDBACK2">
					<baseValue baseType="identifier">CORRECT</baseValue>
				</setOutcomeValue>
			</responseElseIf>
			<responseElse>
				<setOutcomeValue identifier="FEEDBACK2">
					<baseValue baseType="identifier">PARTIAL</baseValue>
				</setOutcomeValue>
			</responseElse>
		</responseCondition>
        <setOutcomeValue identifier="FEEDBACK">
            <variable identifier="<?php echo $this->_tpl_vars['questionid']; ?>
"/>
        </setOutcomeValue>		
	</responseProcessing>
    <?php if ($this->_tpl_vars['correctfeedback'] != ''): ?>
	<modalFeedback outcomeIdentifier="FEEDBACK2" identifier="CORRECT" showHide="show"><?php echo $this->_tpl_vars['correctfeedback']; ?>
</modalFeedback>
 	<?php endif; ?>
    <?php if ($this->_tpl_vars['partiallycorrectfeedback'] != ''): ?>
	<modalFeedback outcomeIdentifier="FEEDBACK2" identifier="PARTIAL" showHide="show"><?php echo $this->_tpl_vars['partiallycorrectfeedback']; ?>
</modalFeedback>
 	<?php endif; ?>
    <?php if ($this->_tpl_vars['incorrectfeedback'] != ''): ?>
	<modalFeedback outcomeIdentifier="FEEDBACK2" identifier="INCORRECT" showHide="show"><?php echo $this->_tpl_vars['incorrectfeedback']; ?>
</modalFeedback>
 	<?php endif; ?>
    <?php if ($this->_tpl_vars['generalfeedback'] != ''): ?>
	<modalFeedback outcomeIdentifier="completionStatus" identifier="not_attempted" showHide="hide"><?php echo $this->_tpl_vars['generalfeedback']; ?>
</modalFeedback>
 	<?php endif; ?>
</assessmentItem>