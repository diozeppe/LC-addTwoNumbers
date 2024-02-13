/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $dummy = new ListNode;
        $listNode = $dummy;
        $carryOn = 0;

        while ($l1 || $l2) {
            $v = $l1?->val + $l2?->val + $carryOn;

            if ($v > 9) {
                $listNode->next = new ListNode($v - 10);
                $carryOn = 1;
            } else {
                $listNode->next = new ListNode($v);
                $carryOn = 0;
            }

            $listNode = $listNode->next;            
            $l1 = $l1->next;
            $l2 = $l2->next;
        }

        if ($carryOn && !$l1 && !$l2) { 
            $listNode->next = new ListNode(1);
        }

        return $dummy->next;
    }
}
