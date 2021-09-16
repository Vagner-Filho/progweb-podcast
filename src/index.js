import _ from 'lodash';
import './style.css';
import bootstrap from 'bootstrap';

function component() {
    const element = document.createElement('div');
  
    element.innerHTML = _.join(['Hello', 'webpack'], ' ');
    element.classList.add('hello');
    
    return element;
  }
  
  document.body.appendChild(component());

export default bootstrap;