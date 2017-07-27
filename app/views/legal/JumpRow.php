function onOpen() {
  
   SpreadsheetApp.getUi() // Or DocumentApp or FormApp.
      .createMenu('Jump to Row')
      .addItem('Select Row Number', 'JumpToCell')
      .addToUi();
  //JumpToCell();
};
 
function JumpToCell() {
  var ui = SpreadsheetApp.getUi(); // Same variations.

  var result = ui.prompt(
      'Please sellect row number',
      'Type row number:',
      ui.ButtonSet.OK_CANCEL);
  
  // Process the user's response.
  var button = result.getSelectedButton();
  var text = result.getResponseText();
  
  if (button == ui.Button.OK)
  {
    // User clicked "OK".
    //ui.alert('Your name is ' + text + '.');
    var s = SpreadsheetApp.getActiveSpreadsheet();
  // Replace "Sheet1" with the sheet name for your spreadsheet
  var tab = s.getSheetByName("POSTPAID");
  // replace (25,1) with the row,column where the cursor should be
  tab.setActiveCell(tab.getRange(text, 1));
  } 
  
  else if (button == ui.Button.CANCEL)
  {
    // User clicked "Cancel".
    //ui.alert('Done');
  }
  else if (button == ui.Button.CLOSE) 
  {
    // User clicked X in the title bar.
   // ui.alert('You closed the dialog.');
  }
  
  
  /*var s = SpreadsheetApp.getActiveSpreadsheet();
  // Replace "Sheet1" with the sheet name for your spreadsheet
  var tab = s.getSheetByName("POSTPAID");
  // replace (25,1) with the row,column where the cursor should be
  tab.setActiveCell(tab.getRange(8005, 1));*/
}

function showPrompt() {
  

  // Process the user's response.
  var button = result.getSelectedButton();
  var text = result.getResponseText();
  if (button == ui.Button.OK)
  {
    // User clicked "OK".
    ui.alert('Your name is ' + text + '.');
  } 
  else if (button == ui.Button.CANCEL)
  {
    // User clicked "Cancel".
    ui.alert('I didn\'t get your name.');
  }
  else if (button == ui.Button.CLOSE) 
  {
    // User clicked X in the title bar.
    ui.alert('You closed the dialog.');
  }
}