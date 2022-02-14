// import React from 'react';
import { ArrowLeftIcon, ArrowRightIcon } from '@chakra-ui/icons'

const classNames = (...classes) => classes.filter(Boolean).join(' ')

const Pagination = ({ data, handleClick = false }) => {

  const checkButton = (label) => {
    if (label === 'Next')
  }

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
