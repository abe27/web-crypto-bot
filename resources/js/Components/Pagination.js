// import React from 'react';
import { ArrowLeftIcon, ArrowRightIcon } from '@chakra-ui/icons'

const classNames = (...classes) => classes.filter(Boolean).join(' ')

const CheckPage = (x, index) => {
  if (x.url) {

  }

  return <></>
}

const Pagination = ({ data, handleClick = false }) => {
  if (data) {
    return data.map((i, index) => (
      <button
        onClick={() => handleClick(i)}
        key={index}
        className={classNames(i.active ? 'btn-disabled' : '', 'btn btn-sm')}
      >
        {i.label}
      </button>
    ))
  }

  return <></>
}

export default Pagination
