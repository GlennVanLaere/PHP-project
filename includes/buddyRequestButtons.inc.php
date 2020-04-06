<?php if ($person->hasBuddy($person->getBuddyId())): ?>
<a href="#" class="btn btn-danger">Remove buddy</a>
<a href="#" class="btn btn-info">Open chat</a>
<?php elseif ($person->sentRequest($userId, $person->getBuddyId())): ?>
<a href="#" class="btn btn-danger">Cancel Request</a>
<?php elseif ($person->receivedRequest($userId, $person->getBuddyId())): ?>
<a href="#" class="btn btn-danger">Ignore</a>
<a href="#" class="btn btn-info">Accept</a>
<?php else: ?>
<a href="#" class="btn btn-danger">Send Request</a>
<?php endif; ?>