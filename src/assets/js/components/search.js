class Search {
  // 1. describe and create / initiate our object
  constructor() {
    this.search = document.querySelector('.custom_search');
    this.icon = document.querySelector('.icon');
    this.clear = document.querySelector('.clear');
    this.search_button = document.querySelector('.search-btn');
    this.search_input = document.getElementById('my_search');

    this.activeStatus;
    this.events();
    this.onChangeValue();
    this.searchState();
  }

  // 2. events
  events() {
    this.icon.addEventListener('click', this.iconClick.bind(this));
    this.search_input.addEventListener('input', this.onInput.bind(this));
    this.clear.addEventListener('click', this.onClear.bind(this));
  }

  // 3. methods
  iconClick() {
    let activeState = this.search.classList.toggle('active');
    console.log(activeState);
    if (activeState) {
      sessionStorage.setItem('activeState', 'active');
    } else {
      sessionStorage.clear();
    }
  }

  searchState() {
    this.activeStatus = sessionStorage.getItem('activeState');
    if (this.activeStatus === 'active') {
      this.search.classList.toggle('active');
    }
  }

  onChangeValue() {
    if (this.search_input.value.length > 0 || this.search_input.value) {
      this.clear.classList.add('shown');
      // this.search_button.classList.add('shown');
    } else {
      this.clear.classList.remove('shown');
      this.search_button.classList.remove('shown');
    }
  }

  onInput() {
    console.log(this.search_input.value);
    this.onChangeValue();
  }

  onClear() {
    this.search_input.value = '';
    this.onChangeValue();
  }
}

export default Search;
