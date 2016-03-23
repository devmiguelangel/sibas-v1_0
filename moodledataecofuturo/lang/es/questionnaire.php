<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'questionnaire', language 'es', branch 'MOODLE_20_STABLE'
 *
 * @package   questionnaire
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additionalinfo_help'] = 'Texto a mostrar en la parte superior de la primera página de esta encuesta. (por ejemplo, instrucciones, información general, etc)';
$string['alreadyfilled'] = 'Usted ya ha cumplimentado la encuesta {$a}. Gracias';
$string['closed'] = 'La encuesta se cerró el {$a}. Gracias.';
$string['confirmdelallresp'] = '¿Está seguro que quiere eliminar TODAS las respuestas de la encuesta?';
$string['confpagedesc'] = 'Título (en negrita) y cuerpo del texto para la página de "confirmación" mostrada después de que el usuario haya finalizado la encuesta. (La URL, si existe, tiene prioridad sobre el texto de confirmación.)';
$string['confpage_help'] = 'Título (en negrita) y cuerpo del texto para la página de "confirmación" mostrada después de que el usuario haya finalizado la encuesta. (La URL, si existe, tiene prioridad sobre el texto de confirmación.). Si deja este campo vacío, se mostrará un mensaje sobre la finalización de la encuesta (Gracias por realizar esta encuesta)';
$string['editingquestionnaire'] = 'Edición de la configuración de la encuesta';
$string['erroropening'] = 'Error abriendo encuesta';
$string['incorrectquestionnaire'] = 'La encuesta es incorrecta';
$string['invalidsurveyid'] = 'ID de la encuesta no válido';
$string['minforcedresponses_help'] = 'Use estos parámetros para forzar a los encuestados a marcar un mínimo de **Min.** casillas de verificación y un máximo de **Max** casillas de verificación. Para forzar un número exacto de casillas de verificación marcar ajuste **Min.** y  **Max.** con el mismo valor.
Si sólo desea un valor mínimo o máximo deje el otro valor con el valor **0** predeterminado.
Si establece **Mín.** o **Max.** en un valor diferente al predeterminado **0**, se le mostrará un mensaje de advertencia si el encuestado no cumple con los requisitos. Obviamente es necesario plantear todos los requisitos de forma clara para el encuestado, ya se en las instrucciones generales de la encuesta o en el texto de las correspondientes preguntas.';
$string['modulename'] = 'Encuesta';
$string['modulenameplural'] = 'Encuestas';
$string['nopublicsurveys'] = 'No hay encuestas públicas';
$string['notavail'] = 'Esta encuesta no esta aún disponible. Inténtelo más tarde.';
$string['noteligible'] = 'Usted no ha sido seleccionado para responder a esta encuesta';
$string['notemplatesurveys'] = 'No hay plantillas de encuesta';
$string['notopen'] = 'Esta encuesta no se abrirá hasta {$a}';
$string['pluginadministration'] = 'Administración de encuestas';
$string['pluginname'] = 'Encuesta';
$string['preview'] = 'Esta es un vista previa de cómo se verá esta encuesta. Cuando haya terminado de verla, pulse <strong>Cerrar</strong> en la parte inferior de esta página.';
$string['previewing'] = 'Previsualizando encuesta';
$string['preview_questionnaire'] = '- Previsualización de la encuesta';
$string['printblanktooltip'] = 'Abre una ventana de impresión con la encuesta en blanco';
$string['questionnaireadministration'] = 'Administración de encuestas';
$string['questionnairecloses'] = 'Encuestas cerradas';
$string['questionnaire:copysurveys'] = 'Copiar plantillas y encuestas privadas';
$string['questionnaire:createpublic'] = 'Crear encuestas públicas';
$string['questionnaire:createtemplates'] = 'Crear plantillas de encuestas';
$string['questionnaire:editquestions'] = 'Crear y editar preguntas de la encuesta';
$string['questionnaire:manage'] = 'Crear y editar encuestas';
$string['questionnaireopens'] = 'Encuestas abiertas';
$string['questionnaire:printblank'] = 'Imprimir encuesta en blanco';
$string['questionnaire:submit'] = 'Cumplimentar y enviar una encuesta';
$string['questionnaire:view'] = 'Ver una encuesta';
$string['realm'] = 'Tipo de Encuesta';
$string['realm_help'] = '* ** Hay tres tipos de encuesta:**

* Privada  - pertenece solo al curso en el que se ha definido

* Plantilla * - puede ser copiada y editada.

* Pública  - se puede compartir entre cursos.';
$string['redirecturl'] = 'La URL a la que el usuario será redireccionado después de completar esta encuesta.';
$string['required_help'] = 'Si selecciona ***Sí***, la respuesta a esta pregunta será obligatotia, es decir, el encuestado no podrá enviar la encuesta hasta haber contestado esta pregunta.';
$string['responseview_help'] = 'Puede especificar quién puede ver las respuestas de los encuestados en las encuestas enviados (tablas estadísticas generales).';
$string['responseviewstudentswhenanswered'] = 'Después de responder a la encuesta';
$string['responseviewstudentswhenclosed'] = 'Después de que la encuesta se cierre';
$string['resumesurvey'] = 'Reanudar encuesta';
$string['savedprogress'] = 'Se ha guardado su progreso. Usted puede volver en cualquier momento para terminar de cumplimentar esta encuesta. Para ello, basta con marcar el enlace {$a} abajo. Es posible que se le solicite su nombre de usuario y contraseña para poder seguir cumplimentando la encuesta.';
$string['selecttheme'] = 'Seleccione un tema gráfico (css) para utilizar en esta encuesta';
$string['submitsurvey'] = 'Enviar encuesta';
$string['subtitle_help'] = 'Subtítulo de esta encuesta. Se muestra solo debajo del título de la primera página.';
$string['surveynotexists'] = 'la encuesta no existe';
$string['surveyowner'] = 'Debe ser propietario de la encuesta para realizar esta operación';
$string['surveyresponse'] = 'Respueta a la encuesta';
$string['templatenotviewable'] = 'No se pueden mostrar las plantillas de encuesta';
$string['thank_head'] = 'Gracias por realizar esta encuesta';
$string['title_help'] = 'Título de la encuesta que aparecerá en la parte superior de cada página. Por defecto Título será el nombre de la encuesta, pero podrá editarlo si lo desea.';
$string['unknownaction'] = 'Se ha especificado una acción sobre la encuesta no válida...';
$string['url_help'] = 'La URL a la que el usuario será redireccionado después de completar esta encuesta.';
