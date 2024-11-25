document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('button');
    
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            alert(`You clicked on ${this.textContent}. This would typically load more information about ${this.textContent}.`);
        });
    });

    const links = document.querySelectorAll('.link');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            alert(`You clicked on ${this.textContent}. This would typically navigate to a page about ${this.textContent}.`);
        });
    });
});