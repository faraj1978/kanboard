<?php

namespace Kanboard\Controller;

/**
 * Task Recurrence controller
 *
 * @package  Kanboard\Controller
 * @author   Frederic Guillot
 */
class TaskRecurrenceController extends BaseController
{
    /**
     * Edit recurrence form
     *
     * @access public
     * @param array $values
     * @param array $errors
     * @throws \Kanboard\Core\Controller\AccessForbiddenException
     * @throws \Kanboard\Core\Controller\PageNotFoundException
     */
    public function edit(array $values = array(), array $errors = array())
    {
        $task = $this->getTask();

        if (empty($values)) {
            $values = $task;
        }

        $this->response->html($this->template->render('task_recurrence/edit', array(
            'values' => $values,
            'errors' => $errors,
            'task' => $task,
            'recurrence_status_list' => $this->task->getRecurrenceStatusList(),
            'recurrence_trigger_list' => $this->task->getRecurrenceTriggerList(),
            'recurrence_timeframe_list' => $this->task->getRecurrenceTimeframeList(),
            'recurrence_basedate_list' => $this->task->getRecurrenceBasedateList(),
        )));
    }

    /**
     * Update recurrence form
     *
     * @access public
     */
    public function update()
    {
        $task = $this->getTask();
        $values = $this->request->getValues();

        list($valid, $errors) = $this->taskValidator->validateEditRecurrence($values);

        if ($valid) {
            if ($this->taskModification->update($values)) {
                $this->flash->success(t('Task updated successfully.'));
            } else {
                $this->flash->failure(t('Unable to update your task.'));
            }

            return $this->response->redirect($this->helper->url->to('TaskViewController', 'show', array('project_id' => $task['project_id'], 'task_id' => $task['id'])), true);
        }

        return $this->edit($values, $errors);
    }
}
