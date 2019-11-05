const tc = (e,c,d) => {

  let container = d.getElementById(e),
      tags      = [...container.querySelectorAll('h2, h3, h4, h5, h6')],
      output    = d.getElementById(c);

  let nav  = d.createElement('nav');
  nav.classList.add('tc');

  let titles = tags.map(t => {
    // Adding ID to the actual titles
    let idContent = t.textContent.replace(/ /g, "_") 
    t.id = idContent;

    //	Creating Elements
    let title = d.createElement(t.nodeName);
    let link = d.createElement('a');

    // Adding Content
    link.textContent = t.textContent;
    link.href = `#${idContent}`;
    
    title.appendChild(link);
    nav.appendChild(title);
  });


  // Adding to the DOM
  output.appendChild(nav);
};