import React from 'react'
import { Alert, AlertIcon, Stack } from '@chakra-ui/react'

const ValidationErrors = ({ errors }) => {
  return (
    Object.keys(errors).length > 0 && (
      <Stack spacing={3}>
        {Object.keys(errors).map((key, index) => {
          return (
            <Alert key={index} status="warning">
              <AlertIcon />
              {errors[key]}
            </Alert>
          )
        })}
      </Stack>
    )
  )
}

export default ValidationErrors
