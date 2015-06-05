/**
 * Created by TJF on 6/5/2015.
 */
function openTextInNew(textbox){
    window.open(textbox.value, '_blank');
    this.blur();
}