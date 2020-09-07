<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Collective\Html\HtmlFacade;

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
        $this->record->APPROVER_FIRST_LEVEL = trim($this->record->APPROVER_FIRST_LEVEL);
        $this->record->APPROVER_SECOND_LEVEL = trim($this->record->APPROVER_SECOND_LEVEL);
        $this->record->APPROVER_THIRD_LEVEL = trim($this->record->APPROVER_THIRD_LEVEL);
        
        $lvl1Line1 = '';
        $lvl1Line2 = '';
        $lvl1Line3 = '';
        $lvl1Line4 = '';
        
        $lvl2Line1 = '';
        $lvl2Line2 = '';
        $lvl2Line3 = '';
        $lvl2Line4 = '';
        
        $lvl3Line1 = '';
        $lvl3Line2 = '';
        $lvl3Line3 = '';
        $lvl3Line4 = '';
        
        switch (trim ( $this->record->status )) {
            case 'Approved' :
                
                $col1 = 'green';                
                $lvl1Line1 = "Approved by :";
                $lvl1Line2 = $this->record->approver_first_level;
                $lvl1Line3 = substr ( $this->record->approver_first_level_ts, 0, 16 );                
                $app1 = null;
                
                $col2 = 'green';                
                $lvl2Line1 = "Approved by :";
                $lvl2Line2 = $this->record->approver_second_level;
                $lvl2Line3 = substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                
                $col3 = 'green';                
                $lvl3Line1 = "Approved by :";
                $lvl3Line2 = $this->record->approver_third_level;
                $lvl3Line3 = substr ( $this->record->approver_third_level_ts, 0, 16 );
                $app3 = null;
                
                break;
            case 'Awaiting 1st Level' :
                
                $col1  = 'yellow';
                $lvl1Line1 = "Waiting on:";
                $lvl1Line2 = $this->record->approver_first_level;
                $app1  = "<BR/><BR/><a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=1&amp;status=Approved&amp;via=online target='_blank'>Approve";
                $app1 .= "<img src='images/icon-system-status-ok.gif' width='14' height='14' alt='approve' /></a>";
                $app1 .= "&nbsp;&nbsp;<a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=1&amp;status=Rejected&amp;via=online target='_blank'>Reject";
                $app1 .= "<img src='images/icon-system-status-na.gif' width='14' height='14' alt='reject' /></a>";
                
                $col2 = 'yellow';
                $lvl2Line1 = "Waiting on 1st Level:";
                $lvl2Line2 = "2nd Level approver is:";
                $lvl2Line3 = $this->record->approver_second_level;
                $app2 = null;
                
                $col3 = 'yellow';
                $lvl3Line1 = "Waiting on 1st Level:";
                $lvl3Line2 = "3rd Level approver is:";
                $lvl3Line3 = $this->record->approver_third_level;
                $app3 = null;
                
                break;
            case 'Awaiting 2nd Level' :
                
                $col1 = 'green';
                $lvl1Line1 = "Approved by :";
                $lvl1Line2 = $this->record->approver_first_level;
                $lvl1Line3 = substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                
                $col2 = 'yellow';
                $lvl2Line1 = "Waiting on:";
                $lvl2Line2 = $this->record->approver_second_level;
                
                $app2  = "<BR/><BR/><a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=2&amp;status=Approved&amp;via=online target='_blank'>Approve";
                $app2 .= "<img src='images/icon-system-status-ok.gif' width='14' height='14' alt='approve' /></a>";
                $app2 .= "&nbsp;&nbsp;<a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=2&amp;status=Rejected&amp;via=online target='_blank'>Reject";
                $app2 .= "<img src='images/icon-system-status-na.gif' width='14' height='14' alt='reject' /></a>";
                
                $col3 = 'yellow';
                $lvl3Line1 = "Waiting on 2nd Level:";
                $lvl3Line2 = "3rd Level approver is:";
                $lvl3Line3 = $this->record->approver_third_level;
                $app3 = null;
                
                break;
            case 'Awaiting 3rd Level' :
                
                $col1 = 'green';
                $lvl1Line1 = 'Approved by :';
                $lvl1Line2 = $this->record->approver_first_level;
                $lvl1Line3 = substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                
                $col2 = 'green';
                $lvl2Line1 = 'Approved by :';
                $lvl2Line2 = $this->record->approver_second_level;
                $lvl2Line3 = substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                
                $col3 = 'yellow';
                $lvl3Line1 = 'Waiting on:';
                $lvl3Line2 = $this->record->approver_third_level;
                
                $app3  = "<BR/><BR/><a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=3&amp;status=Approved&amp;via=online target='_blank'>Approve";
                $app3 .= "<img src='images/icon-system-status-ok.gif' width='14' height='14' alt='approve' /></a>";
                $app3 .= "&nbsp;&nbsp;<a href=p_approveNe2.php?ref=" . $this->record->reference . "&amp;cat=3&amp;status=Rejected&amp;via=online target='_blank'>Reject";
                $app3 .= "<img src='images/icon-system-status-na.gif' width='14' height='14' alt='reject' /></a>";
                
                break;
            case 'Rejected by 1st Level' :
                
                $col1 = 'red';
                $lvl1Line1 = 'Rejcted by :';
                $lvl1Line2 = $this->record->approver_first_level;
                $lvl1Line3 = substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                
                $col2 = 'yellow';
                $lvl2Line1 = 'Rejected by 1st Level';
                $lvl2Line2 = "2nd level approver was :";
                $lvl2Line3 = substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                
                $col3 = 'yellow';
                $lvl3Line1 = 'Rejected by 1st Level';
                $lvl3Line2 = "3rd level approver was :";
                $lvl3Line3 = substr ( $this->record->approver_third_level_ts, 0, 16 );
                $app3 = null;
                
                break;
            case 'Rejected by 2nd Level' :
                
                $col1 = 'green';
                $lvl1Line1 = 'Approved by :';
                $lvl1Line2 = $this->record->approver_first_level;
                $lvl1Line3 = substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                
                $col2 = 'red';
                $lvl2Line1 = 'Rejected by :';
                $lvl2Line2 = $this->record->approver_second_level;
                $lvl2Line3 = substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                
                $col3 = 'yellow';
                $lvl3Line1 = 'Rejected by 2nd Level';
                $lvl3Line2 = "3rd level approver was :";
                $lvl3Line3 = substr ( $this->record->approver_third_level_ts, 0, 16 );
                $app3 = null;
                
                break;
            case 'Rejected by 3rd Level' :
                
                $col1 = 'green';
                $lvl1Line1 = 'Approved by :';
                $lvl1Line2 = $this->record->approver_first_level;
                $lvl1Line3 = substr ( $this->record->approver_first_level_ts, 0, 16 );
                $app1 = null;
                
                $col2 = 'green';
                $lvl2Line1 = 'Approved by :';
                $lvl2Line2 = $this->record->approver_second_level;
                $lvl2Line3 = substr ( $this->record->approver_second_level_ts, 0, 16 );
                $app2 = null;
                
                $col3 = 'red';
                $lvl3Line1 = 'Rejected by :';
                $lvl3Line2 = $this->record->approver_second_level;
                $lvl3Line3 = substr ( $this->record->approver_third_level_ts, 0, 16 );
                $app3 = null;
                
                break;
            default :
                
                $col1 = 'blue';
                $app1 = null;
                $lvl1Line1 = 'See Status';
                $lvl1Line2 = "1st Approver was:";
                $lvl1Line3 = trim($this->record->APPROVER_FIRST_LEVEL);
                $lvl1Line4 = substr ( $this->record->approver_first_level_ts, 0, 16 );
                
                $col2 = 'blue';
                $app2 = null;
                $lvl2Line1 = 'See Status';
                $lvl2Line2 = "2nd Approver was:";
                $lvl2Line3 = trim($this->record->APPROVER_SECOND_LEVEL);
                $lvl2Line4 = substr ( $this->record->approver_second_level_ts, 0, 16 );
                
                $col3 = 'blue';
                $app3 = null;
                $lvl3Line1 = 'See Status';
                $lvl3Line2 = "3rd Approver was:";
                $lvl3Line3 = trim($this->record->APPROVER_THIRD_LEVEL);
                $lvl3Line4 = substr ( $this->record->approver_third_level_ts, 0, 16 );
                
                break;
        }
        
        $data = array(
            
            'col1' => $col1,
            'lvl1Line1' => $lvl1Line1,
            'lvl1Line2' => $lvl1Line2,
            'lvl1Line3' => $lvl1Line3,
            'lvl1Line4' => $lvl1Line4,
            'app1' => $app1,
            
            'col2' => $col2,
            'lvl2Line1' => $lvl2Line1,
            'lvl2Line2' => $lvl2Line2,
            'lvl2Line3' => $lvl2Line3,
            'lvl2Line4' => $lvl2Line4,
            'app2' => $app2,
            
            'col3' => $col3,
            'lvl3Line1' => $lvl3Line1,
            'lvl3Line2' => $lvl3Line2,
            'lvl3Line3' => $lvl3Line3,
            'lvl3Line4' => $lvl3Line4,
            'app3' => $app3
            
        );
        
        return view('components.approvers-info', $data);
    }
}
