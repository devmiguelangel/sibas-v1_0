<?php /* Smarty version 2.6.26, created on 2014-01-16 13:35:24
         compiled from match.tpl */ ?>
<assessmentItem xmlns="http://www.imsglobal.org/xsd/imsqti_item_v2p0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.imsglobal.org/xsd/imsqti_item_v2p0 ./imsqti_item_v2p0.xsd" identifier="<?php echo $this->_tpl_vars['assessmentitemidentifier']; ?>
" title="<?php echo $this->_tpl_vars['assessmentitemtitle']; ?>
" adaptive="false" timeDependent="false">
	<responseDeclaration identifier="<?php echo $this->_tpl_vars['questionid']; ?>
" cardinality="multiple" baseType="directedPair">
		<correctResponse>
   		<?php unset($this->_sections['set']);
$this->_sections['set']['name'] = 'set';
$this->_sections['set']['loop'] = is_array($_loop=$this->_tpl_vars['matchsets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['set']['show'] = true;
$this->_sections['set']['max'] = $this->_sections['set']['loop'];
$this->_sections['set']['step'] = 1;
$this->_sections['set']['start'] = $this->_sections['set']['step'] > 0 ? 0 : $this->_sections['set']['loop']-1;
if ($this->_sections['set']['show']) {
    $this->_sections['set']['total'] = $this->_sections['set']['loop'];
    if ($this->_sections['set']['total'] == 0)
        $this->_sections['set']['show'] = false;
} else
    $this->_sections['set']['total'] = 0;
if ($this->_sections['set']['show']):

            for ($this->_sections['set']['index'] = $this->_sections['set']['start'], $this->_sections['set']['iteration'] = 1;
                 $this->_sections['set']['iteration'] <= $this->_sections['set']['total'];
                 $this->_sections['set']['index'] += $this->_sections['set']['step'], $this->_sections['set']['iteration']++):
$this->_sections['set']['rownum'] = $this->_sections['set']['iteration'];
$this->_sections['set']['index_prev'] = $this->_sections['set']['index'] - $this->_sections['set']['step'];
$this->_sections['set']['index_next'] = $this->_sections['set']['index'] + $this->_sections['set']['step'];
$this->_sections['set']['first']      = ($this->_sections['set']['iteration'] == 1);
$this->_sections['set']['last']       = ($this->_sections['set']['iteration'] == $this->_sections['set']['total']);
?>
				<value>q<?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['id']; ?>
 a<?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['id']; ?>
</value>
   		<?php endfor; endif; ?>
		</correctResponse>

		<mapping defaultValue="0">
   		<?php unset($this->_sections['set']);
$this->_sections['set']['name'] = 'set';
$this->_sections['set']['loop'] = is_array($_loop=$this->_tpl_vars['matchsets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['set']['show'] = true;
$this->_sections['set']['max'] = $this->_sections['set']['loop'];
$this->_sections['set']['step'] = 1;
$this->_sections['set']['start'] = $this->_sections['set']['step'] > 0 ? 0 : $this->_sections['set']['loop']-1;
if ($this->_sections['set']['show']) {
    $this->_sections['set']['total'] = $this->_sections['set']['loop'];
    if ($this->_sections['set']['total'] == 0)
        $this->_sections['set']['show'] = false;
} else
    $this->_sections['set']['total'] = 0;
if ($this->_sections['set']['show']):

            for ($this->_sections['set']['index'] = $this->_sections['set']['start'], $this->_sections['set']['iteration'] = 1;
                 $this->_sections['set']['iteration'] <= $this->_sections['set']['total'];
                 $this->_sections['set']['index'] += $this->_sections['set']['step'], $this->_sections['set']['iteration']++):
$this->_sections['set']['rownum'] = $this->_sections['set']['iteration'];
$this->_sections['set']['index_prev'] = $this->_sections['set']['index'] - $this->_sections['set']['step'];
$this->_sections['set']['index_next'] = $this->_sections['set']['index'] + $this->_sections['set']['step'];
$this->_sections['set']['first']      = ($this->_sections['set']['iteration'] == 1);
$this->_sections['set']['last']       = ($this->_sections['set']['iteration'] == $this->_sections['set']['total']);
?>
   		   <mapEntry mapKey="q<?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['id']; ?>
 a<?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['id']; ?>
" mappedValue="1"/>
   		<?php endfor; endif; ?>
		</mapping>
	</responseDeclaration>
	<outcomeDeclaration identifier="SCORE" cardinality="single" baseType="float"/>

	<itemBody>
		<p><?php echo $this->_tpl_vars['questionText']; ?>
</p>
		<div class="interactive.match">
			<matchInteraction responseIdentifier="<?php echo $this->_tpl_vars['questionid']; ?>
" shuffle="false" maxAssociations="<?php echo $this->_tpl_vars['setcount']; ?>
">
				<simpleMatchSet>
           		<?php unset($this->_sections['set']);
$this->_sections['set']['name'] = 'set';
$this->_sections['set']['loop'] = is_array($_loop=$this->_tpl_vars['matchsets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['set']['show'] = true;
$this->_sections['set']['max'] = $this->_sections['set']['loop'];
$this->_sections['set']['step'] = 1;
$this->_sections['set']['start'] = $this->_sections['set']['step'] > 0 ? 0 : $this->_sections['set']['loop']-1;
if ($this->_sections['set']['show']) {
    $this->_sections['set']['total'] = $this->_sections['set']['loop'];
    if ($this->_sections['set']['total'] == 0)
        $this->_sections['set']['show'] = false;
} else
    $this->_sections['set']['total'] = 0;
if ($this->_sections['set']['show']):

            for ($this->_sections['set']['index'] = $this->_sections['set']['start'], $this->_sections['set']['iteration'] = 1;
                 $this->_sections['set']['iteration'] <= $this->_sections['set']['total'];
                 $this->_sections['set']['index'] += $this->_sections['set']['step'], $this->_sections['set']['iteration']++):
$this->_sections['set']['rownum'] = $this->_sections['set']['iteration'];
$this->_sections['set']['index_prev'] = $this->_sections['set']['index'] - $this->_sections['set']['step'];
$this->_sections['set']['index_next'] = $this->_sections['set']['index'] + $this->_sections['set']['step'];
$this->_sections['set']['first']      = ($this->_sections['set']['iteration'] == 1);
$this->_sections['set']['last']       = ($this->_sections['set']['iteration'] == $this->_sections['set']['total']);
?>
    				<simpleAssociableChoice identifier="q<?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['id']; ?>
" matchMax="1"><?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['questiontext']; ?>
</simpleAssociableChoice>
           		<?php endfor; endif; ?>
				</simpleMatchSet>
				<simpleMatchSet>
           		<?php unset($this->_sections['set']);
$this->_sections['set']['name'] = 'set';
$this->_sections['set']['loop'] = is_array($_loop=$this->_tpl_vars['matchsets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['set']['show'] = true;
$this->_sections['set']['max'] = $this->_sections['set']['loop'];
$this->_sections['set']['step'] = 1;
$this->_sections['set']['start'] = $this->_sections['set']['step'] > 0 ? 0 : $this->_sections['set']['loop']-1;
if ($this->_sections['set']['show']) {
    $this->_sections['set']['total'] = $this->_sections['set']['loop'];
    if ($this->_sections['set']['total'] == 0)
        $this->_sections['set']['show'] = false;
} else
    $this->_sections['set']['total'] = 0;
if ($this->_sections['set']['show']):

            for ($this->_sections['set']['index'] = $this->_sections['set']['start'], $this->_sections['set']['iteration'] = 1;
                 $this->_sections['set']['iteration'] <= $this->_sections['set']['total'];
                 $this->_sections['set']['index'] += $this->_sections['set']['step'], $this->_sections['set']['iteration']++):
$this->_sections['set']['rownum'] = $this->_sections['set']['iteration'];
$this->_sections['set']['index_prev'] = $this->_sections['set']['index'] - $this->_sections['set']['step'];
$this->_sections['set']['index_next'] = $this->_sections['set']['index'] + $this->_sections['set']['step'];
$this->_sections['set']['first']      = ($this->_sections['set']['iteration'] == 1);
$this->_sections['set']['last']       = ($this->_sections['set']['iteration'] == $this->_sections['set']['total']);
?>
    				<simpleAssociableChoice identifier="a<?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['id']; ?>
" matchMax="<?php echo $this->_tpl_vars['setcount']; ?>
"><?php echo $this->_tpl_vars['matchsets'][$this->_sections['set']['index']]['answertext']; ?>
</simpleAssociableChoice>
           		<?php endfor; endif; ?>
				</simpleMatchSet>
			</matchInteraction>
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
	<responseProcessing xmlns="http://www.imsglobal.org/xsd/imsqti_item_v2p0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.imsglobal.org/xsd/imsqti_item_v2p0 ../imsqti_item_v2p0.xsd">
		<responseCondition>

			<responseIf>
				<isNull>
					<variable identifier="<?php echo $this->_tpl_vars['questionid']; ?>
"/>
				</isNull>
				<setOutcomeValue identifier="SCORE">
					<baseValue baseType="integer">0</baseValue>
				</setOutcomeValue>
			</responseIf>

			<responseElse>
				<setOutcomeValue identifier="SCORE">
					<mapResponse identifier="<?php echo $this->_tpl_vars['questionid']; ?>
"/>
				</setOutcomeValue>
			</responseElse>
		</responseCondition>
	</responseProcessing>
</assessmentItem>