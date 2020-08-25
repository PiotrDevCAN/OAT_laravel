<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ApproversInfo extends Component
{
    /**
     * The record.
     *
     * @var string
     */
    
    public $record;
    
    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $record
     * @return void
     */
    public function __construct($record)
    {
        $this->record = $record;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        switch (trim ( $this->record->status )) {
            case 'Approved' :
                $col1 = 'green';
                $lvl1 = "Approved by :<BR/><a href='mailto:" . trim ( $this->record->approver_first_level ) . "'>" . trim ( $this->record->approver_first_level ) . "</a><BR/>" . substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                $col2 = 'green';
                $lvl2 = "Approved by :<BR/><a href='mailto:" . trim ( $this->record->approver_second_level ) . "'>" . trim( $this->record->approver_second_level ) . "</a><BR/>" . substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                $col3 = 'green';
                $lvl3 = "Approved by :<BR/><a href='mailto:" . trim ( $this->record->approver_third_level ) . "'>" . trim( $this->record->approver_third_level ) . "</a><BR/>" . substr ( $this->record->approver_third_level_ts, 0, 16 );
                $app3 = null;
                break;
            case 'Awaiting 1st Level' :
                $col1  = 'yellow';
                $lvl1  = "Waiting on:<BR/><a href='mailto:" . trim($this->record->approver_first_level) . "'>" . trim($this->record->approver_first_level) . "</a>";
                $app1  = "<BR/><BR/><a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=1&amp;status=Approved&amp;via=online target='_blank'>Approve";
                $app1 .= "<img src='images/icon-system-status-ok.gif' width='14' height='14' alt='approve' /></a>";
                $app1 .= "&nbsp;&nbsp;<a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=1&amp;status=Rejected&amp;via=online target='_blank'>Reject";
                $app1 .= "<img src='images/icon-system-status-na.gif' width='14' height='14' alt='reject' /></a>";
                $col2 = 'yellow';
                $lvl2 = "Waiting on 1st Level:<BR/>2nd Level approver is:<BR><a href='mailto:" . trim($this->record->approver_second_level) . "'>" . trim($this->record->approver_second_level) . "</a>";
                $app2 = null;
                $col3 = 'yellow';
                $lvl3 = "Waiting on 1st Level:<BR/>3rd Level approver is:<BR><a href='mailto:" . trim($this->record->approver_third_level) . "'>" . trim($this->record->approver_third_level) . "</a>";
                $app3 = null;
                break;
            case 'Awaiting 2nd Level' :
                $col1 = 'green';
                $lvl1 = "Approved by :<BR/><a href='mailto:" . trim ( $this->record->approver_first_level ) . "'>" . trim ( $this->record->approver_first_level ) . "</a><BR/>" . substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                $col2 = 'yellow';
                $lvl2 = "Waiting on:<BR/><a href='mailto:" . trim($this->record->approver_second_level) . "'>" . trim($this->record->approver_second_level) . "</a>";
                $app2  = "<BR/><BR/><a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=2&amp;status=Approved&amp;via=online target='_blank'>Approve";
                $app2 .= "<img src='images/icon-system-status-ok.gif' width='14' height='14' alt='approve' /></a>";
                $app2 .= "&nbsp;&nbsp;<a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=2&amp;status=Rejected&amp;via=online target='_blank'>Reject";
                $app2 .= "<img src='images/icon-system-status-na.gif' width='14' height='14' alt='reject' /></a>";
                $col3 = 'yellow';
                $lvl3 = "Waiting on 2nd Level:<BR/>3rd Level approver is:<BR><a href='mailto:" . trim($this->record->approver_third_level) . "'>" . trim($this->record->approver_third_level) . "</a>";
                $app3 = null;
                break;
            case 'Awaiting 3rd Level' :
                $col1 = 'green';
                $lvl1 = "Approved by :<BR/><a href='mailto:" . trim ( $this->record->approver_first_level ) . "'>" . trim ( $this->record->approver_first_level ) . "</a><BR/>" . substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                $col2 = 'green';
                $lvl2 = "Approved by :<BR/><a href='mailto:" . trim ( $this->record->approver_second_level ) . "'>" . trim ( $this->record->approver_second_level ) . "</a><BR/>" . substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                $col3 = 'yellow';
                $lvl3 = "Waiting on:<BR/><a href='mailto:" . trim($this->record->approver_third_level) . "'>" . trim($this->record->approver_third_level) . "</a>";
                $app3  = "<BR/><BR/><a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=3&amp;status=Approved&amp;via=online target='_blank'>Approve";
                $app3 .= "<img src='images/icon-system-status-ok.gif' width='14' height='14' alt='approve' /></a>";
                $app3 .= "&nbsp;&nbsp;<a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=3&amp;status=Rejected&amp;via=online target='_blank'>Reject";
                $app3 .= "<img src='images/icon-system-status-na.gif' width='14' height='14' alt='reject' /></a>";
                break;
            case 'Rejected by 1st Level' :
                $col1 = 'red';
                $lvl1 = "Rejcted by :<BR/>" . $this->record->approver_first_level . "<BR/>" . substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                $col2 = 'yellow';
                $lvl2 = "Rejected by 1st Level<BR/>2nd level approver was :<BR/>" . $this->record->approver_second_level_ts ;
                $app2 = null;
                $col3 = 'yellow';
                $lvl3 = "Rejected by 1st Level<BR/>3rd level approver was :<BR/>" . $this->record->approver_third_level_ts  ;
                $app3 = null;
                break;
            case 'Rejected by 2nd Level' :
                $col1 = 'green';
                $lvl1 = "Approved by :<BR/>" . $this->record->approver_first_level . "<BR/>" . substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                $col2 = 'red';
                $lvl2 = "Rejected by :<BR/>" . $this->record->approver_second_level . "<BR/>" . substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                $col3 = 'yellow';
                $lvl3 = "Rejected by 2nd Level<BR/>3rd level approver was :<BR/>" . $this->record->approver_third_level_ts ;
                $app3 = null;
                break;
            case 'Rejected by 3rd Level' :
                $col1 = 'green';
                $lvl1 = "Approved by :<BR/>" . $this->record->approver_first_level . "<BR/>" . substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                $col2 = 'green';
                $lvl2 = "Approved by :<BR/>" . $this->record->approver_second_level . "<BR/>" . substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                $col3 = 'red';
                $lvl3 = "Rejected by :<BR/>" . $this->record->approver_second_level . "<BR/>" . substr ( $this->record->approver_third_level_ts, 0, 16 );
                $app3 = null;
                break;
            default :
                $col1 = 'blue';
                $app1 = null;
                $lvl1 = 'See Status<BR/>1st Approver was:<br/>' . trim($this->record->APPROVER_FIRST_LEVEL) . "<BR/>" . substr ( $this->record->approver_first_level_ts, 0, 16 );
                $col2 = 'blue';
                $app2 = null;
                $lvl2 = 'See Status<BR/>2nd Approver was:<br/>' . trim($this->record->APPROVER_SECOND_LEVEL) . "<BR/>" . substr ( $this->record->approver_second_level_ts, 0, 16 );
                $col3 = 'blue';
                $app3 = null;
                $lvl3 = 'See Status<BR/>3rd Approver was:<br/>' . trim($this->record->APPROVER_THIRD_LEVEL) . "<BR/>" . substr ( $this->record->approver_third_level_ts, 0, 16 );
        }
        
        $data = array(
            'col1' => $col1,
            'lvl1' => $lvl1,
            'app1' => $app1,
            'col2' => $col2,
            'lvl2' => $lvl2,
            'app2' => $app2,
            'col3' => $col3,
            'lvl3' => $lvl3,
            'app3' => $app3
        );
        
        return view('components.approvers-info', $data);
    }
}
