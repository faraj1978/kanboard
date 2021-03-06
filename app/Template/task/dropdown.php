<div class="dropdown">
    <a href="#" class="dropdown-menu">#<?= $task['id'] ?></a>
    <ul>
        <?php if (array_key_exists('date_started', $task) && empty($task['date_started'])): ?>
        <li>
            <i class="fa fa-play fa-fw"></i>
            <?= $this->url->link(t('Set automatically the start date'), 'TaskModificationController', 'start', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
        </li>
        <?php endif ?>
        <li>
            <i class="fa fa-user fa-fw"></i>
            <?= $this->url->link(t('Change assignee'), 'TaskPopoverController', 'changeAssignee', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-tag fa-fw"></i>
            <?= $this->url->link(t('Change category'), 'TaskPopoverController', 'changeCategory', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-pencil-square-o fa-fw"></i>
            <?= $this->url->link(t('Edit the task'), 'TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-align-left fa-fw"></i>
            <?= $this->url->link(t('Edit the description'), 'TaskModificationController', 'description', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-plus fa-fw"></i>
            <?= $this->url->link(t('Add a sub-task'), 'SubtaskController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-code-fork fa-fw"></i>
            <?= $this->url->link(t('Add internal link'), 'TaskInternalLinkController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-external-link fa-fw"></i>
            <?= $this->url->link(t('Add external link'), 'TaskExternalLink', 'find', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-comment-o fa-fw"></i>
            <?= $this->url->link(t('Add a comment'), 'comment', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-camera fa-fw"></i>
            <?= $this->url->link(t('Add a screenshot'), 'TaskPopoverController', 'screenshot', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-files-o fa-fw"></i>
            <?= $this->url->link(t('Duplicate'), 'taskduplication', 'duplicate', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-clipboard fa-fw"></i>
            <?= $this->url->link(t('Duplicate to another project'), 'taskduplication', 'copy', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <li>
            <i class="fa fa-clone fa-fw"></i>
            <?= $this->url->link(t('Move to another project'), 'taskduplication', 'move', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
        </li>
        <?php if ($this->user->canRemoveTask($task)): ?>
            <li>
                <i class="fa fa-trash-o fa-fw"></i>
                <?= $this->url->link(t('Remove'), 'TaskViewController', 'remove', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
            </li>
        <?php endif ?>
        <?php if (isset($task['is_active'])): ?>
        <li>
            <?php if ($task['is_active'] == 1): ?>
                <i class="fa fa-times fa-fw"></i>
                <?= $this->url->link(t('Close this task'), 'TaskStatusController', 'close', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
            <?php else: ?>
                <i class="fa fa-check-square-o fa-fw"></i>
                <?= $this->url->link(t('Open this task'), 'TaskStatusController', 'open', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'popover') ?>
            <?php endif ?>
        </li>
        <?php endif ?>

        <?= $this->hook->render('template:task:dropdown', array('task' => $task)) ?>
    </ul>
</div>
