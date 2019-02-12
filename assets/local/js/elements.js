/*  */
var createDiv = function(id, className) {
    var div = document.createElement('div');
    if (id) div.setAttribute('id', id);
    if (className) div.setAttribute('class', className);
    return div;
};

/*  */
var createModal = function(id, title) {
    /* Modal */
    this.modal = createDiv(id, 'modal fade');

    /* Modal dialog */
    this.dialog = createDiv(null, 'modal-dialog');

    /* Modal content */
    this.content = createDiv(null, 'modal-content');

    /* Modal header */
    this.header = createDiv(null, 'modal-header');

    /* Modal body */
    this.body = createDiv(null, 'modal-body');

    /* Modal footer */
    this.footer = createDiv(null, 'modal-footer');

    if (title) {
        this.title = createDiv(null, 'modal-title');
        var titleText = document.createTextNode(title);
        this.title.appendChild(titleText);
        this.header.appendChild(this.title);
    }

    /* Close button */
    this.closeBtn = document.createElement('button')
    this.closeBtn.setAttribute('class','btn btn-default');
    this.closeBtn.setAttribute('data-dismiss','modal');
    var btnText = document.createTextNode('Close');
    this.closeBtn.appendChild(btnText);
    this.footer.appendChild(this.closeBtn);

    /* Append elements */
    this.modal.appendChild(this.dialog);
    this.dialog.appendChild(this.content);
    this.content.appendChild(this.header);
    this.content.appendChild(this.body);
    this.content.appendChild(this.footer);

    return this;
}

/*  */
var searchInput = function(id, className, callback) {
    var input = document.createElement('input');

    if (id) input.setAttribute('id', id);
    if (className) input.setAttribute('class', className);

    input.addEventListener('keydown', function(e) {
        if (input.typing) clearTimeout(input.typing);
        input.typing = setTimeout(callback, 500, input);
    });
    return input;
}

/* Growl message */
var growlMessage = function(message) {
    var span = document.createElement('span');
    span.style.marginRight = "15px";
    span.innerHTML = message;
    return span.outerHTML;
};