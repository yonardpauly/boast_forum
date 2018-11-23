<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
<style>
.eggc-forum, .eggc-forum p { font-size: 18px !important }
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    border: 1px solid #888;
    position: relative;
    border-radius: 1%;
    margin: auto;
    padding: 0;
    width: 30%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from { top:-300px; opacity:0 } 
    to { top:-30px; opacity:1 }
}

@keyframes animatetop {
    from { top:-300px; opacity:0 }
    to { top:-30px; opacity:1 }
}

/* The Close Button */
.close {
    color: white;
    font-size: 28px;
    font-weight: bold
}

.close:hover,
.close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer
}

.modal-header {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center;
    padding: 10px 16px;
    background: hsl(0, 0%, 21%)
}

.modal-body { padding: 2px 16px }

.modal-footer {
    display: flex;
    justify-content: flex-end;
    padding: 10px 16px;
    background: hsl(0, 0%, 21%);
    color: #fff
}
</style>