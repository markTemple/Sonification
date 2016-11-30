<SCRIPT LANGUAGE="JavaScript">
<!--
function onChange(object) {
    var Current = object.selectName.selectedIndex;
    object.currentText.value = object.selectName.options[Current].text;
    object.currentValue.value = object.selectName.options[Current].value;
}

//-->
</SCRIPT>

<FORM NAME="formName3" onSubmit="return false;">
<SELECT NAME="selectName" onChange="onChange(this.form)">
<OPTION VALUE="Option 0" SELECTED>Entry 0
<OPTION VALUE="Option 1">Entry 1
<OPTION VALUE="Option 2">Entry 2
<OPTION VALUE="Option 3">Entry 3
<OPTION VALUE="Option 4">Entry 4
<OPTION VALUE="Option 5">Entry 5
</SELECT>
<P>
Text: <INPUT NAME="currentText" TYPE="TEXT" VALUE="">
Value: <INPUT NAME="currentValue" TYPE="TEXT" VALUE="">
<P>
</FORM>

<SCRIPT LANGUAGE="JavaScript">
<!--
onChange(document.formName2);
//-->
</SCRIPT>
