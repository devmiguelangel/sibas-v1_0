<?php /* Smarty version 2.6.26, created on 2014-01-16 13:35:24
         compiled from imsmanifest.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<manifest xmlns="http://www.imsglobal.org/xsd/imscp_v1p1" xmlns:imsmd="http://www.imsglobal.org/xsd/imsmd_v1p2" xmlns:imsqti="http://www.imsglobal.org/xsd/imsqti_item_v2p0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" identifier="<?php echo $this->_tpl_vars['manifestidentifier']; ?>
" xsi:schemaLocation="http://www.imsglobal.org/xsd/imscp_v1p1 imscp_v1p1.xsd   http://www.imsglobal.org/xsd/imsmd_v1p2 imsmd_v1p2p2.xsd  http://www.imsglobal.org/xsd/imsqti_item_v2p0 ./imsqti_item_v2p0.xsd">
	<metadata>
		<schema>ADL SCORM</schema>
		<schemaversion>1.2</schemaversion>
		<lom xmlns="http://www.imsglobal.org/xsd/imsmd_v1p2"
     			xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
     			xsi:schemaLocation="http://www.imsglobal.org/xsd/imsmd_v1p2 imsmd_v1p2p2.xsd">
     		<general>
				<title><langstring xml:lang="<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_tpl_vars['quiztitle']; ?>
</langstring></title>
				<description><langstring xml:lang="<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_tpl_vars['quizinfo']; ?>
</langstring></description>
				<keyword><langstring xml:lang="<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_tpl_vars['quizkeywords']; ?>
</langstring></keyword>
			</general>
		</lom>
   		<?php if ($this->_tpl_vars['quiz_level_export'] == 1): ?>
    		<imsqti:var id="submiturl"><?php echo $this->_tpl_vars['submiturl']; ?>
</imsqti:var>
    		<imsqti:var id="userid"><?php echo $this->_tpl_vars['userid']; ?>
</imsqti:var>
    		<imsqti:var id="username"><?php echo $this->_tpl_vars['username']; ?>
</imsqti:var>
    		<imsqti:var id="id"><?php echo $this->_tpl_vars['quiz']->id; ?>
</imsqti:var>
    		<imsqti:var id="course"><?php echo $this->_tpl_vars['quiz']->course; ?>
</imsqti:var>
    		<imsqti:var id="timeopen"><?php echo $this->_tpl_vars['quiztimeopen']; ?>
</imsqti:var>
    		<imsqti:var id="timeclose"><?php echo $this->_tpl_vars['quiztimeclose']; ?>
</imsqti:var>
    		<imsqti:var id="timelimit"><?php echo $this->_tpl_vars['quiz']->timelimit; ?>
</imsqti:var>
    		<imsqti:var id="shufflequestions"><?php echo $this->_tpl_vars['quiz']->shufflequestions; ?>
</imsqti:var>
    		<imsqti:var id="shuffleanswers"><?php echo $this->_tpl_vars['quiz']->shuffleanswers; ?>
</imsqti:var>
    		<imsqti:var id="attempts"><?php echo $this->_tpl_vars['quiz']->attempts; ?>
</imsqti:var>
    		<imsqti:var id="attemptbuildsonlast"><?php echo $this->_tpl_vars['quiz']->attemptonlast; ?>
</imsqti:var>
    		<imsqti:var id="grademethod"><?php echo $this->_tpl_vars['grademethod']; ?>
</imsqti:var>
    		<imsqti:var id="feedback"><?php echo $this->_tpl_vars['quiz']->feedback; ?>
</imsqti:var>
    		<imsqti:var id="feedbackcorrectanswers"><?php echo $this->_tpl_vars['quiz']->correctanswers; ?>
</imsqti:var>
    		<imsqti:var id="maxgrade"><?php echo $this->_tpl_vars['quiz']->grade; ?>
</imsqti:var>
    		<imsqti:var id="rawpointspossible"><?php echo $this->_tpl_vars['quiz']->sumgrades; ?>
</imsqti:var>
    		<imsqti:var id="password"><?php echo $this->_tpl_vars['quiz']->password; ?>
</imsqti:var>
    		<imsqti:var id="subnet"><?php echo $this->_tpl_vars['quiz']->subnet; ?>
</imsqti:var>
    		<imsqti:var id="coursefullname"><?php echo $this->_tpl_vars['course']->fullname; ?>
</imsqti:var>
    		<imsqti:var id="courseshortname"><?php echo $this->_tpl_vars['course']->shortname; ?>
</imsqti:var>
		<?php endif; ?>
	</metadata>
	<organizations/>
	<resources>
    	<?php unset($this->_sections['question']);
$this->_sections['question']['name'] = 'question';
$this->_sections['question']['loop'] = is_array($_loop=$this->_tpl_vars['questions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['question']['show'] = true;
$this->_sections['question']['max'] = $this->_sections['question']['loop'];
$this->_sections['question']['step'] = 1;
$this->_sections['question']['start'] = $this->_sections['question']['step'] > 0 ? 0 : $this->_sections['question']['loop']-1;
if ($this->_sections['question']['show']) {
    $this->_sections['question']['total'] = $this->_sections['question']['loop'];
    if ($this->_sections['question']['total'] == 0)
        $this->_sections['question']['show'] = false;
} else
    $this->_sections['question']['total'] = 0;
if ($this->_sections['question']['show']):

            for ($this->_sections['question']['index'] = $this->_sections['question']['start'], $this->_sections['question']['iteration'] = 1;
                 $this->_sections['question']['iteration'] <= $this->_sections['question']['total'];
                 $this->_sections['question']['index'] += $this->_sections['question']['step'], $this->_sections['question']['iteration']++):
$this->_sections['question']['rownum'] = $this->_sections['question']['iteration'];
$this->_sections['question']['index_prev'] = $this->_sections['question']['index'] - $this->_sections['question']['step'];
$this->_sections['question']['index_next'] = $this->_sections['question']['index'] + $this->_sections['question']['step'];
$this->_sections['question']['first']      = ($this->_sections['question']['iteration'] == 1);
$this->_sections['question']['last']       = ($this->_sections['question']['iteration'] == $this->_sections['question']['total']);
?>
		<resource identifier="category<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['category']; ?>
-question<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['id']; ?>
" type="imsqti_item_xmlv2p0" <?php if ($this->_tpl_vars['externalfiles'] == 1): ?>href="./category<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['category']; ?>
-question<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['id']; ?>
.xml"<?php endif; ?>>
			<metadata>
				<schema>IMS QTI Item</schema>
				<schemaversion>2.0</schemaversion>
				<imsmd:lom>
					<imsmd:general>
						<imsmd:identifier>category<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['category']; ?>
-question<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['id']; ?>
</imsmd:identifier>
						<imsmd:title>
							<imsmd:langstring xml:lang="<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['name']; ?>
</imsmd:langstring>
						</imsmd:title>
						<imsmd:description>
							<imsmd:langstring xml:lang="en">Question <?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['id']; ?>
 from category <?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['category']; ?>
</imsmd:langstring>
						</imsmd:description>
					</imsmd:general>
					<imsmd:lifecycle>
						<imsmd:version>
							<imsmd:langstring xml:lang="en">1.0</imsmd:langstring>
						</imsmd:version>
						<imsmd:status>
							<imsmd:source>
								<imsmd:langstring xml:lang="en">LOMv1.0</imsmd:langstring>
							</imsmd:source>
							<imsmd:value>
								<imsmd:langstring xml:lang="en">Draft</imsmd:langstring>
							</imsmd:value>
						</imsmd:status>
					</imsmd:lifecycle>
				</imsmd:lom>
				<imsqti:qtiMetadata>
					<imsqti:timeDependent>false</imsqti:timeDependent>
					<imsqti:interactionType><?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['qtiinteractiontype']; ?>
</imsqti:interactionType>
					<imsqti:canComputerScore><?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['qtiscoreable']; ?>
</imsqti:canComputerScore>
					<imsqti:feedbackType>nonadaptive</imsqti:feedbackType>
					<imsqti:solutionAvailable><?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['qtisolutionavailable']; ?>
</imsqti:solutionAvailable>
				</imsqti:qtiMetadata>
			</metadata>
			<?php if ($this->_tpl_vars['questions'][$this->_sections['question']['index']]['image'] != ''): ?>
			<file href="<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['mediaurl']; ?>
" />
			<?php endif; ?>
			<?php echo $this->_tpl_vars['questions'][$this->_sections['question']['index']]['exporttext']; ?>

		</resource>
		<?php endfor; endif; ?>
	</resources>
</manifest>