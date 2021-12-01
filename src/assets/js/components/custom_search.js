const icon = document.querySelector('.icon');
const search = document.querySelector('.custom_search');
const clear = document.querySelector('.clear');
const search_button = document.querySelector('.search-btn');
const search_input = document.getElementById('my_search');

icon.onclick = function () {
  const activeState = search.classList.toggle('active');
  console.log(activeState);
  if (activeState) {
    sessionStorage.setItem('activeState', 'active');
  } else {
    sessionStorage.clear();
  }
};

const activeStatus = sessionStorage.getItem('activeState');
if (activeStatus === 'active') {
  search.classList.toggle('active');
}

function onChangeValue() {
  if (search_input.value.length > 0 || search_input.value) {
    clear.classList.add('shown');
    search_button.classList.add('shown');
  } else {
    clear.classList.remove('shown');
    search_button.classList.remove('shown');
  }
}

onChangeValue();

const input = search_input.addEventListener('input', function () {
  console.log(search_input.value);
  onChangeValue();
});

clear.onclick = function () {
  search_input.value = '';
  onChangeValue();
};
